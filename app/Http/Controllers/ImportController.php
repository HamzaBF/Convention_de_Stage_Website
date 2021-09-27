<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;



class ImportController extends Controller
{
    //
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportView()
    {
       return view('admin.file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new EmployeesImport, $request->file('file')->store('temp'));
        return back();
    }
}
