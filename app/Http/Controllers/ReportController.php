<?php

namespace App\Http\Controllers;

use App\Models\Employee;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;


class ReportController extends Controller
{
    public function employeeReport()
    {
        $employees = Employee::all();
        $pdf = PDF::loadView('report.employee', compact('employees'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('employee_report.pdf');
    }
}
