<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Convention;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;
use Illuminate\Support\Str;


class ConventionManagementController extends Controller
{
    //
    public function index()
     {
         $conventions = Convention::latest()->paginate(7);
 
         return view('RH.conventions.index', compact('conventions'));
     }

     // display the holl convention in format html

     public function show($id)
    {
        $convention = Convention::find($id);

        if( $convention->Remunire == 'yes' )
        {
            return view('pdf.pdf', compact('convention'));
        }

        else
        {
            return view('pdf_non', compact('convention'));
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
            $convention->Indemnite =  $request->get('Indemnite');
            $convention->Sujet =  $request->get('sujet');
            $convention->date_debut = $request->get('Date_Debut');
            $convention->date_fin = $request->get('Date_Fin');
            $convention->DR = $request->get('DR');
            $convention->save();

            return redirect('/convention')->with('success', 'La convention de stage est mise à jour !');
        }

    // print pdf file

    public function downloadPDF($id){
        //retrieve all records from db
        $convention = Convention::find($id);

        //share data to view
        if( $convention->Remunire == 'yes')
        {
                // view()->share('convention', $convention);
            $pdf = PDF::loadView('pdf', compact('convention'));
            $pdf->setOption('page-size', 'A4');
            


            return $pdf->download('Convention_de_stage__'.$convention->Name.'.pdf');
        }
        elseif( $convention->Remunire == 'no' )
        {
                    // view()->share('convention', $convention);
            $pdf = PDF::loadView('pdf_non', compact('convention'));
            $pdf->setOption('page-size', 'A4');
    

            return $pdf->download('Convention_de_stage__'.$convention->Name.'.pdf');

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
