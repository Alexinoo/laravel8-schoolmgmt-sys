<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

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
     $registrationfee = App\Models\FeeAmount::where('fee_category_id', 2)->where('class_id', $model->class_id)->first();
    $originalfee = $registrationfee->amount;
    $discount =  $model->discount->discount ;
    $discounttablefee = $discount / 100 * $originalfee;
    $finalfee = (float)$originalfee - (float)$discounttablefee;
    @endphp

<table id="customers">
  <tr>
    <td><h2>Coding Pro</h2></td>
    <td><h2>School ERP</h2></th>
    <p>School Address</p>
    <p>Phone : 43434</p>
    <p>Email : support@codingpro.com</p>
  </tr>
</table>

<table id="customers">
  <tr>
    <th width="10%">No</th>
    <th width="45%"> Name </th>
    <th width="45%">Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><strong>Student name</strong></td>
    <td>{{$model->user->name}}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><strong>Reg No</strong></td>
    <td>{{$model->user->id_no}}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><strong>Roll No</strong></td>
    <td>{{$model->roll }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><strong>Father's name</strong></td>
    <td>{{$model->user->father_name}}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><strong>Session</strong></td>
    <td>{{$model->year->name}}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><strong>Class</strong></td>
    <td>{{$model->class->name}}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><strong>Registration Fee</strong></td>
    <td>${{$originalfee}}.00</td>
  </tr>
  <tr>
    <td>8</td>
    <td><strong>Discount</strong></td>
    <td>{{$discount}}%</td>
  </tr>
  <tr>
    <td>9</td>
    <td><strong>Fee For this Student</strong></td>
    <td>${{$finalfee}}.00</td>
  </tr>
 
</table>
<br>
<i style="font-size:10px; float : right;">Print Data  : {{ date("d-m-Y") }}</i>

    <hr style="border: 1px solid #000000 ; width:100%;margin:50px;">
</body>
</html>