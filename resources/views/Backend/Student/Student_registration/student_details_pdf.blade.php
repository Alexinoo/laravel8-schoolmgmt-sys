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
    <td>0</td>
    <td><strong>Student name</strong></td>
    <td>{{$model->user->name}}</td>
  </tr>
  <tr>
    <td>1</td>
    <td><strong>Reg No</strong></td>
    <td>{{$model->user->id_no}}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><strong>Roll</strong></td>
    <td>{{$model->roll }}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><strong>Father's name</strong></td>
    <td>{{$model->user->father_name}}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><strong>Mother's name</strong></td>
    <td>{{$model->user->mother_name}}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><strong>Phone</strong></td>
    <td>{{$model->user->phone}}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><strong>Address</strong></td>
    <td>{{$model->user->address}}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><strong>Gender</strong></td>
    <td>{{$model->user->gender}}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><strong>Religion</strong></td>
    <td>{{$model->user->religion}}</td>
  </tr>
  <tr>
    <td>9</td>
    <td><strong>Date Of Birth</strong></td>
    <td>{{$model->user->dob}}</td>
  </tr>
  <tr>
    <td>10</td>
    <td><strong>Discount</strong></td>
    <td>{{!empty($model->discount->discount) ? $model->discount->discount : '0' }} %</td>
  </tr>
  <tr>
    <td>11</td>
    <td><strong>Year</strong></td>
    <td>{{$model->year->name}}</td>
  </tr>
  <tr>
    <td>12</td>
    <td><strong>Class</strong></td>
    <td>{{$model->class->name}}</td>
  </tr>
  <tr>
    <td>13</td>
    <td><strong>Group</strong></td>
    <td>{{$model->group->name}}</td>
  </tr>
   <tr>
    <td>14</td>
    <td><strong>Shift</strong></td>
    <td>{{$model->shift->name}}</td>
  </tr>
</table>
<br>
<i style="font-size:10px; float : right;">Print Data  : {{ date("d-m-Y") }}</i>

</body>
</html>