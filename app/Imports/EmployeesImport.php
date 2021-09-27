<?php

namespace App\Imports;

use App\Models\Employees;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employees([
            //
            'Name'     => $row[0],
            'email'    => $row[1]
        ]);
    }
}
