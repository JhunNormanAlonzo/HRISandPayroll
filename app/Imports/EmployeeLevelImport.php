<?php

namespace App\Imports;

use App\Models\EmployeeLevel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeLevelImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new EmployeeLevel([
           'level_desc' => $row['emp_rank']
        ]);
    }
}
