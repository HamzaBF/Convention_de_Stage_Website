<?php

namespace App\Http\Controllers\Encadrant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Convention;
use App\Models\User;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Employees;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','verified']);
      }
      
      // display all users

     public function index()
     {
         
        $user = User::find(Auth()->id());
        $conventions = Convention::where('Tuteur',$user->name)->get();
 
         return view('encadrant.index', compact('conventions'));
     }

          // edit function

          public function edit($id)
          {
            $tuteurs = Employees::all();
            $convention = Convention::find($id);
            return view('encadrant.edit', compact('convention','tuteurs'));        
          }
      
          // update function
      
          public function update(Request $request, $id)
              {
                  $request->validate([
                      'Name'=>'required'
                  ]);
      
                  $convention = Convention::find($id);
                  $convention->Tuteur = $request->input('tuteur');
                  $convention->Sujet =  $request->get('sujet');
                  $convention->date_debut = $request->get('Date_Debut');
                  $convention->date_fin = $request->get('Date_Fin');
                  $convention->DR = $request->get('DR');
                  $convention->save();

                  $data = array(
                        'name'      =>  $request->input('Name'),
                        'tuteur'    =>  $convention->Tuteur,
                        'message'   =>   "une nouvelle convention a été complétée par "
                    );

                  Mail::to('a.fathi@mascir.ma')->send(new SendMail($data));
      
                  return redirect('/encadrant')->with('success', 'La convention de stage est envoyée au département ressources humaine.');
              }
}
