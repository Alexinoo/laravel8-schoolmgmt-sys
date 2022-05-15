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
                <p><strong>Student Perfomance Report<strong></p>
        </tr>
    </table>
    <br><br>
    <strong>Result of : </strong> {{ $allData[0]->exam->name }}

    <br><br>
    <table id="customers">
        <tr>
            <th width="50%">
                Year / Session
            </th>
            <th width="50%">
                Class :
            </th>
        </tr>
        <tr>
            <td width="50%">
                {{ $allData[0]->year->name }}

            </td>
            <td width="50%">
                {{ $allData[0]->class->name }}
            </td>
        </tr>

    </table>
    <br>
    <i style="font-size:10px; float : right;">Print Data : {{ date("d-m-Y") }}</i>
</body>
</html>
