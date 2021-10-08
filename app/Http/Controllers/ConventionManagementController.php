<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Mail\ConventionMail;
use App\Models\User;
use App\Models\Convention;
use App\Models\Employees;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;




class ConventionManagementController extends Controller
{
    //
    public function index()
     {
         $conventions = Convention::latest()->paginate(7);
 
         return view('RH.conventions.index', compact('conventions'));
     }

     // display the holl convention in format html

     public function SendEmail($id)
    {
        $convention = Convention::find($id);
        $user = User::where('name',$convention->Name)->first();
        $tuteur = Employees::where('Name',$convention->Tuteur)->first();

        if( !is_null($convention->Indemnite))
            {
                //share data to view
            if( $convention->Remunire == 'Oui')
            {
                    // view()->share('convention', $convention);
                $pdf = PDF::loadView('pdf', compact('convention'));
                $pdf->setOption('page-size', 'A4');

                $data = array(
                    'name'      =>  $convention->Name,
                    'gender'    =>  $convention->gender,
                    'message'   =>  "Nous vous remercions de trouver en pièce jointe votre convention de stage à signer ; et à faire signer par votre établissement en 3 exemplaires originaux.
                    Merci de la renvoyer par émail à l'adresse : r.elidrissi@mascir.ma, ou de déposer les 3 copies auprès du département des Ressources Humaines."
                );
        
                Mail::to($user->email)->cc([$tuteur->email])->send(new SendMail($data,$pdf));

                return redirect('/convention')->with('success', "La convention de stagiaire est envoyée au stagiaire !");

            }

            elseif( $convention->Remunire == 'Non' )
            {
                        // view()->share('convention', $convention);
                $pdf = PDF::loadView('pdf_non', compact('convention'));
                $pdf->setOption('page-size', 'A4');

                $data = array(
                    'name'      =>  $convention->Name,
                    'gender'    =>  $convention->gender,
                    'message'   =>  "Nous vous remercions de trouver en pièce jointe votre convention de stage à signer ; et à faire signer par votre établissement en 3 exemplaires originaux.
                    Merci de la renvoyer par émail à l'adresse : r.elidrissi@mascir.ma, ou de déposer les 3 copies auprès du département des Ressources Humaines."
                );
        
                Mail::to($user->email)->cc([$tuteur->email])->send(new SendMail($data,$pdf));
                
                return redirect('/convention')->with('success', "La convention de stagiaire est envoyée au stagiaire !");
        

            }

            }
        else 
            {
                return redirect('/convention')->with('success', "Merci de remplir tous les champs avant d'imprimer la convention de stage !");
            }
        
    }

     // edit function

     public function edit($id)
    {
        $convention = Convention::find($id);
        return view('RH.conventions.edit', compact('convention'));   
    }

    // update function

    public function update(Request $request, $id)
        {
            $request->validate([
                'Name'=>'required'
            ]);


            $convention = Convention::find($id);
            $user = User::where('name',$convention->Name)->first();
            $tuteur = Employees::where('Name',$convention->Tuteur)->first();

            $convention = Convention::find($id);
            $convention->Indemnite =  $request->get('Indemnite');
            $convention->Sujet =  $request->get('sujet');
            $convention->date_debut = $request->get('Date_Debut');
            $convention->date_fin = $request->get('Date_Fin');
            $convention->DR = $request->get('demanderecrut');
            $convention->save();

            


            return redirect('/convention')->with('success', 'La convention de stage est mise à jour et envoyé au stagiaire!');
        }

    // print pdf file

    public function downloadPDF($id){
        //retrieve all records from db
        $convention = Convention::find($id);
        $user = User::find(Auth()->id());

        // RH download pdf
        
        if( !is_null($convention->Indemnite))
            {
                //share data to view
            if( $convention->Remunire == 'Oui')
            {
                    // view()->share('convention', $convention);
                $pdf = PDF::loadView('pdf', compact('convention'));
                $pdf->setOption('page-size', 'A4');

                return $pdf->download('Convention_de_stage__'.$convention->Name.'.pdf');

            }

            elseif( $convention->Remunire == 'Non' )
            {
                        // view()->share('convention', $convention);
                $pdf = PDF::loadView('pdf_non', compact('convention'));
                $pdf->setOption('page-size', 'A4');
        
                return $pdf->download('Convention_de_stage__'.$convention->Name.'.pdf');

            }

            }
        else 
            {
                return redirect('/convention')->with('success', "Merci de remplir tous les champs avant d'imprimer la convention de stage !");
            }
            
            
        

        //download PDF file with download method
        // return $pdf->download(Str::slug($convention->Name).".pdf");

   }

    // Download RIB
    public function download($id)
    {
        $convention = Convention::find($id);
        $pathToFile = storage_path('app/files/' . $convention->RIB);
        return response()->download($pathToFile);
    }

}
