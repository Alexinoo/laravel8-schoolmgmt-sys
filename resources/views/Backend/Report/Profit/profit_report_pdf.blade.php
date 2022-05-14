<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

    </style>
</head>
<body>

    @php

    $TotalStudentFees = App\Models\Account_student_fee::whereBetween('date' , [$start_date ,$end_date])->sum('amount');

    $OtherTotalCosts = App\Models\Other_cost::whereBetween('date' , [$fullStartDate , $fullEndDate])->sum('amount');

    $EmpSalaries = App\Models\Salary_account::whereBetween('date' , [$start_date , $end_date])->sum('amount');

    $totalCost = $OtherTotalCosts + $EmpSalaries;

    $profit = $TotalStudentFees - $totalCost ;

    @endphp

    <table id="customers">
        <tr>
            <td>
                <h2>
                    <?php $img_path = '/uploads/easyschool.png' ?>
                    <img src="{{ public_path() . $img_path }}" alt="School Logo" style="width: 200;height:100;">
                </h2>
            </td>
            <td>
                <h2>School ERP</h2>
                </th>
                <p>School Address</p>
                <p>Phone : 43434</p>
                <p>Email : support@codingpro.com</p>
                <p><strong> Monthly / Yearly Profit<strong></p>
        </tr>
    </table>

    <table id="customers">
        <tr>
            <td colspan="2" style="text-align:center;">
                <h4>Reporting Date : {{ date('d M Y',strtotime($fullStartDate)) }} - {{ date('d M Y',strtotime($fullEndDate)) }}</h4>


            </td>
        </tr>
        <tr>
            <td>Purpose</td>
            <td>
                <h4>Amount</h4>
            </td>
        </tr>
        <tr>
            <td>Student Fees</td>
            <td>{{ $TotalStudentFees }}</td>


        </tr>
        <tr>
            <td>Employee Salaries</td>
            <td>{{ $EmpSalaries  }}</td>


        </tr>
        <tr>
            <td>Other Costs</td>
            <td>{{$OtherTotalCosts}}</td>


        </tr>
        <tr>
            <td>Total Costs</td>
            <td>{{$totalCost }}</td>

        </tr>
        <tr>
            <td>Profit</td>
            <td>{{$profit}}</td>
        </tr>

    </table>
    <br>
    <i style="font-size:10px; float : right;">Print Data : {{ date("d-m-Y") }}</i>

    <hr style="border: 1px solid #000000 ; width:100%;margin:50px;">
</body>
</html>
