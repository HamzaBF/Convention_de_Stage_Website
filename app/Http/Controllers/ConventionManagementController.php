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
         $conventions = Convention::all();
 
         return view('RH.conventions.index', compact('conventions'));
     }

     // display the holl convention in format html

     public function show($id)
    {
        $convention = Convention::find($id);
        
        return view('pdf', compact('convention'));
    }

    // print pdf file

    public function downloadPDF($id){
        
        //retrieve all records from db
        $convention = Convention::find($id);

        //share data to view

        // view()->share('convention', $convention);
        $pdf = PDF::loadView('pdf', compact('convention'));
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 1000);
        $pdf->setOption('no-stop-slow-scripts', true);
        $pdf->setOption('page-size', 'A4');
        $pdf->setOption('margin-left', 0);
        $pdf->setOption('margin-right', 0);
        $pdf->setOption('margin-top', 0);
        $pdf->setOption('margin-bottom', 0);
        $pdf->setOption('lowquality', false);
        $pdf->setOption('disable-smart-shrinking', true);

        return $pdf->stream('test_pdf.pdf');

        //download PDF file with download method
        // return $pdf->download(Str::slug($convention->Name).".pdf");

   }

}
