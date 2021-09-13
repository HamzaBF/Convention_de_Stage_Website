<?php

namespace App\Http\Controllers\Encadrant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Convention;
use App\Models\User;

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
              $convention = Convention::find($id);
              return view('encadrant.edit', compact('convention'));        
          }
      
          // update function
      
          public function update(Request $request, $id)
              {
                  $request->validate([
                      'Name'=>'required'
                  ]);
      
                  $convention = Convention::find($id);
                  $convention->Sujet =  $request->get('sujet');
                  $convention->date_debut = $request->get('Date_Debut');
                  $convention->date_fin = $request->get('Date_Fin');
                  $convention->save();
      
                  return redirect('/encadrant')->with('success', 'Convention Updated');
              }
}
