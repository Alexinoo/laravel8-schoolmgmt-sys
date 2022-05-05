@extends('Admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">      

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Attendance</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('employee_attendance.store')}}" method="POST">
                     @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                       <div class="form-group">
                                        <h5>Attendance date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" class="form-control"/>
                                             @error('date')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th rowspan ="2" class="text-center" style="vertical-align: middle;">ID</th>
                                                <th rowspan ="2" class="text-center" style="vertical-align: middle;">Emp No</th>
                                                <th rowspan ="2" class="text-center" style="vertical-align: middle;">Employees</th>
                                                <th colspan ="3" class="text-center" style="vertical-align: middle ;width:40%;">Attendance Status</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center btn present_all" style="display: table-cell; background-color:#000000;">Present</th>
                                                <th class="text-center btn leave_all" style="display: table-cell; background-color:#000000;">On Leave</th>
                                                <th class="text-center btn absent_all" style="display: table-cell; background-color:#000000;">Absent</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($employees as $key => $employee)
                                                <tr class="text-center" id="div{{$employee->id}}">
                                                    <input type="hidden" name="employee_id[]" value="{{$employee->id}}">
                                                <td>{{$key+1}}</td>
                                                <td>{{$employee->id_no}}</td>
                                                <td>{{$employee->name}}</td>
                                                <td colspan="3">
                                                    <div class="switch-toggle switch-3 switch-candy">

                                                        <input name="attendance_status{{$key}}" type="radio" id="present{{$key}}" checked="checked" value="Present"/>
					                                	<label for="present{{$key}}">Present</label>

                                                       <input name="attendance_status{{$key}}" type="radio" id="leave{{$key}}" value="Leave"/>
					                                	<label for="leave{{$key}}">On Leave</label>


                                                         <input name="attendance_status{{$key}}" type="radio" id="absent{{$key}}" value="Absent"/>
					                                	<label for="absent{{$key}}">Absent</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                 
                            
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5"value="Submit">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
    </div>
</div>
@endsection