<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\Account_student_fee;
use App\Models\Other_cost;
use App\Models\Salary_account;
use Illuminate\Http\Request;
use PDF;

class ProfitController extends Controller
{
    public function index(){

        return view('Backend.Report.Profit.index');
    }

    public function GetProfitReportDatewise(Request $request)
    {

        $start_date = date('Y-m', strtotime($request->start_date));
        $end_date = date('Y-m', strtotime($request->end_date));

        $fullStartDate = date('Y-m-d', strtotime($request->start_date));
        $fullEndDate = date('Y-m-d', strtotime($request->end_date));
      
      $TotalStudentFees = Account_student_fee::whereBetween('date' , [$start_date ,$end_date])->sum('amount');

      $OtherTotalCosts = Other_cost::whereBetween('date' , [$fullStartDate , $fullEndDate])->sum('amount');

      $EmpSalaries = Salary_account::whereBetween('date' , [$start_date , $end_date])->sum('amount');

      $totalCost =  $OtherTotalCosts +  $EmpSalaries;

      $profit =  $TotalStudentFees - $totalCost ;

        $html['thsource']  = '<th>Student Fee</th>';
        $html['thsource'] .= '<th>Other Cost</th>';
        $html['thsource'] .= '<th>Employee Salaries</th>';
        $html['thsource'] .= '<th>Total Costs</th>';
        $html['thsource'] .= '<th>Profit</th>';
        $html['thsource'] .= '<th>Action</th>';

        $color = 'success';
        $html['tdsource']  = '<td>' . $TotalStudentFees .'</td>';
        $html['tdsource']  .= '<td>' . $OtherTotalCosts .'</td>';
        $html['tdsource']  .= '<td>' . $EmpSalaries .'</td>';
        $html['tdsource']  .= '<td>' . $totalCost .'</td>';
        $html['tdsource']  .= '<td>' . $profit.'</td>';

        $html['tdsource'] .= '<td>';
        $html['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '" title="View PDF" target="_blanks" href="' . route("profit_report_pdf") . '?start_date=' . $fullStartDate.'&end_date=' . $fullEndDate.'"><i class="fa fa-file-pdf-o"></i></a>';
        $html['tdsource'] .= '</td>';

        return response()->json($html);
    }

    // Export to PDF
    public function export_pdf(Request $request){

        $data['start_date'] = date('Y-m', strtotime($request->start_date));
        $data['end_date'] = date('Y-m', strtotime($request->end_date));

        $data['fullStartDate'] = date('Y-m-d', strtotime($request->start_date));
        $data['fullEndDate'] = date('Y-m-d', strtotime($request->end_date));


        $pdf = PDF::loadView('Backend.Report.Profit.profit_report_pdf', $data);

        return $pdf->stream('Profit Report.pdf');

    }
}
