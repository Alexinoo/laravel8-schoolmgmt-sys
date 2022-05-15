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
                <p><strong>Student ID Card<strong></p>
        </tr>
    </table>
    <br><br>
    @foreach ($allData as $key=> $value)

    <table id="customers">
        <tr>
            <td>Image</td>
            <td>Easy School</td>
            <td>Student ID Card</td>
        </tr>
        <tr>
            <td>Name : {{$value->user->name }}</td>
            <td>Year : {{$value->year->name}}</td>

            <td>Class : {{$value->class->name}}</td>

        </tr>
        <tr>
            <td>Roll : {{ $value->roll }}</td>

            <td>ID No : {{$value->user->id_no}}</td>

            <td>Phone : {{$value->user->phone}}</td>

        </tr>
    </table>

    @endforeach

    <br>
    <i style="font-size:10px; float : right;">Print Data : {{ date("d-m-Y") }}</i>
</body>
</html>
