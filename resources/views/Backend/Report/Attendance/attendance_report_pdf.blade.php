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
                <p><strong>Employee Attendance Report<strong></p>
        </tr>
    </table>
    <br><br>
    <strong>Employee No : </strong> {{ $allDays[0]->user->id_no }}
    <strong>Employee Name : </strong> {{ $allDays[0]->user->name }}
    <strong>Month : </strong> {{ $month }}

    <br><br>
    <table id="customers">
        <tr>
            <th>
                <h4>Date</h4>
            </th>
            <th>
                <h4>Attendance status</h4>
            </th>
        </tr>

        @foreach($allDays as $key => $value)
        <tr>
            <td width="50%">
                {{date('d-m-Y',strtotime( $value->date))}}
            </td>
            <td width="50%">
                {{$value->attendance_status}}
            </td>
        </tr>

        @endforeach

        <tr>
            <td colspan="2">
                <strong>Total Absent : </strong> {{$absentCount}} ;
                <strong>Total Leave : </strong> {{$leaveCount}}
            </td>
        </tr>


    </table>
    <br>
    <i style="font-size:10px; float : right;">Print Data : {{ date("d-m-Y") }}</i>
</body>
</html>
