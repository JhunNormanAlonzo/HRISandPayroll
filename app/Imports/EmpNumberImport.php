<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class EmpNumberImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {

        $employee = Employee::where('emp_name', $row['emp_name']);

//        if ($employee->exists()){
//            return new Employee::updateOrCreate([
//                'emp_number' => $employee->exists() ? $row['emp_number']
//            ]);
////            $employee->emp_number = $row['emp_number'];
////            $employee->save();
//        }


    }
}
