@extends('Admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">      

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Salary Increment</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('employee_salary.update',$employee->id)}}" method="POST">
                     @csrf
					  <div class="row">
						<div class="col-12">

                            {{-- Row 1 --}}
                        <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                                        <h5>Employee Reg</h5>
                                        <div class="controls">
                                            <input type="text" name="id_no" readonly value="{{ $employee->id_no }}" class="form-control"/>
                                                                              
                                        </div>
                                    </div>
                           </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                        <h5>Emp Name</h5>
                                        <div class="controls">
                                            <input type="text" name="name" readonly value="{{ $employee->name }}" class="form-control"/>
                                                                              
                                        </div>
                                    </div>
                            </div>
                         </div>

                          {{-- Row 2 --}}
                        <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                                        <h5>Joining Date</h5>
                                        <div class="controls">
                                            <input type="text" name="join_date" readonly value="{{ $employee->join_date }}" class="form-control"/>
                                                                              
                                        </div>
                                    </div>
                           </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                        <h5>Current Salary</h5>
                                        <div class="controls">
                                            <input type="text" name="current_salary" readonly value="{{ $employee->salary }}" class="form-control"/>
                                                                              
                                        </div>
                                    </div>
                           </div>
                         </div>

                          {{-- Row 3 --}}

                            <div class="row">
                                <div class="col-md-6">
                                       <div class="form-group">
                                        <h5>WEF date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="wef" class="form-control"/>
                                            @error('wef')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-6">
                                     <div class="form-group">
                                        <h5>Salary amount<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="salary_increment" class="form-control"/>
                                                                              
                                        </div>
                                    </div>                                   
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