<?php

namespace App\Http\Controllers;

use App\Models\Employee;

use App\Models\Period;
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

    public function contributionView(){
        $employees = Employee::all();
        $periods = Period::all();
        return view('report.contribution', compact('employees', 'periods'));
    }
    public function contributionPost(Request $request){
        $this->validate($request, [
            'tag' => 'required|in:SSS,Pagibig,Philhealth',
        ]);

        dd($request);
//        return view('report.contribution');
    }

}
