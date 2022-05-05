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
  <td><h2>  
      <?php $img_path = '/uploads/easyschool.png' ?>
       <img src="{{ public_path() . $img_path }}" alt="School Logo" style="width: 200;height:100;">
      </h2></td>
    <td><h2>School ERP</h2></th>
    <p>School Address</p>
    <p>Phone : 43434</p>
    <p>Email : support@codingpro.com</p>
    <p><strong>Employee details<strong></p>
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
    <td><strong>Employee name</strong></td>
    <td>{{$model->name}}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><strong>Reg No</strong></td>
    <td>{{$model->id_no}}</td>
  </tr> 
  <tr>
    <td>3</td>
    <td><strong>Father's name</strong></td>
    <td>{{$model->father_name}}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><strong>Mother's name</strong></td>
    <td>{{$model->mother_name}}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><strong>Phone</strong></td>
    <td>{{$model->phone}}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><strong>Address</strong></td>
    <td>{{$model->address}}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><strong>Gender</strong></td>
    <td>{{$model->gender}}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><strong>Religion</strong></td>
    <td>{{$model->religion}}</td>
  </tr>
  <tr>
    <td>9</td>
    <td><strong>Date Of Birth</strong></td>
    <td>{{ date('d-m-Y' , strtotime($model->dob))}}</td>
  </tr>
  <tr>
    <td>10</td>
    <td><strong>Joining Date</strong></td>
      <td>{{ date('d-m-Y' , strtotime($model->join_date))}}</td>
  </tr>
  <tr>
    <td>11</td>
    <td><strong>Designation</strong></td>
    <td>{{$model->designation->name}}</td>
  </tr>
  <tr>
    <td>12</td>
    <td><strong>Salary</strong></td>
    <td>{{$model->salary}}</td>
  </tr>
 
</table>
<br>
<i style="font-size:10px; float : right;">Print Data  : {{ date("d-m-Y") }}</i>

</body>
</html>