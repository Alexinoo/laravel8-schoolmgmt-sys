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
    $date = date('Y-m',strtotime($records[0]->date));


    if ($date != '') {
    $where[] = ['date', 'like', $date . '%'];
    }

    $totalAttendance = App\Models\Employee_attendance::with(['user'])->where($where)->where('employee_id', $records[0]->employee_id )->get();

    // Absent employees
    $absentCount = count($totalAttendance->where('attendance_status', 'Absent'));


    $salary = (float)$records[0]->user->salary;

    $dailySalary = (float) $salary /30;

    $LOP = (float) $absentCount * (float) $dailySalary;

    $totalSalary = (float) $salary - (float) $LOP;


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
                <p><strong>Employee Monthly Salary<strong></p>
        </tr>
    </table>

    <table id="customers">
        <tr>
            <th width="10%">No</th>
            <th width="45%"> Employee Details </th>
            <th width="45%">Employee Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td><strong>Employee no</strong></td>
            <td>{{$records[0]->user->id_no}}</td>

        </tr>
        <tr>
            <td>2</td>
            <td><strong>Employee name</strong></td>
            <td>{{$records[0]->user->name}}</td>

        </tr>
        <tr>
            <td>3</td>
            <td><strong>Basic Salary</strong></td>
            <td>{{$records[0]->user->salary }}</td>

        </tr>
        <tr>
            <td>4</td>
            <td><strong>Salary This Month</strong></td>
            <td>{{ $totalSalary}}</td>

        </tr>
        <tr>
            <td>5</td>
            <td><strong>Month</strong></td>
            <td>{{date('M Y' , strtotime($records[0]->date))}}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><strong>Days Absent</strong></td>
            <td>{{$absentCount}}</td>

        </tr>

    </table>
    <br>
    <i style="font-size:10px; float : right;">Print Data : {{ date("d-m-Y") }}</i>

    <hr style="border: 1px solid #000000 ; width:100%;margin:50px;">
</body>
</html>
