<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Models\Convention;
use App\Models\Employees;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class ConventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // paginate the authorized user's tasks with 5 per page

        $conventions = Convention::latest()->paginate(7);
 
         return view('convention.index', compact('conventions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tuteurs = Employees::all();
        $user = User::find(Auth()->id());
        return view('convention.create',compact('tuteurs','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $user = User::find(Auth()->id());
        $tuteur = Employees::where('Name',$request->input('tuteur'))->first();
        $remunire = $request->input('Remunire');
        //
        // if (Convention::where('Name',$user->name)->exists()) {
        //     // user found
        //     $request->session()->flash('status','votre Convention de stage déjà crée');

        //     return redirect()->route('conventions.index'); 
        //  }

         if($remunire=='yes'){

            //Storage::delete('/public/avatars/'.$user->avatar);

            // Get filename with the extension
            $filenameWithExt = $request->file('rib')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('rib')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('rib')->storeAs('files',$fileNameToStore);

            $convention = new Convention();
            $convention->user_id = Auth()->id();
            $convention->Name = $request->input('Name');
            $convention->Date = $request->input('Date_Naissance');
            $convention->Lieu_De_Naissance = $request->input('Lieu_Naissance');
            $convention->adress = $request->input('Adress');
            $convention->Etablissement = $request->input('Etablissement');
            $convention->Formation = $request->input('Formation');
            $convention->Lieu_De_Stage = $request->input('Lieu_Stage');
            $convention->departement = $request->input('Departement');
            $convention->CIN = $request->input('cin');
            $convention->Tuteur = $request->input('tuteur');
            $convention->Remunire = $request->input('Remunire');

            $convention->RIB = $fileNameToStore;

            $convention->save();

            $data = array(
                'name'      =>  $request->input('Name'),
                'message'   =>   "Merci de compléter ma convention de stage.Et Merci."
            );

            Mail::to($tuteur->email)->send(new SendMail($data));

            

            $request->session()->flash('status','Votre convention de stage a été crée');

            return redirect()->route('conventions.index'); 


        }
        // si le stagiaire n'est pas rémuniré
        else {

            $convention = new Convention();
            $convention->user_id = Auth()->id();
            $convention->Name = $request->input('Name');
            $convention->Date = $request->input('Date_Naissance');
            $convention->Lieu_De_Naissance = $request->input('Lieu_Naissance');
            $convention->adress = $request->input('Adress');
            $convention->Etablissement = $request->input('Etablissement');
            $convention->Formation = $request->input('Formation');
            $convention->Lieu_De_Stage = $request->input('Lieu_Stage');
            $convention->departement = $request->input('Departement');
            $convention->CIN = $request->input('cin');
            $convention->Tuteur = $request->input('tuteur');
            $convention->Remunire = $request->input('Remunire');

            $convention->save();

            $data = array(
                'name'      =>  $request->input('Name'),
                'message'   =>   "Merci de compléter ma convention de stage.Et Merci."
            );

            Mail::to($tuteur->email)->send(new SendMail($data));

            

            $request->session()->flash('status','Votre convention de stage a été crée.');

            return redirect()->route('conventions.index');

        }

         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $convention = Convention::find($id);

        return view('convention.show', compact('convention'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
