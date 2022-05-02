@extends('Admin.admin_master')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
	
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			  <div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Search</strong></h4>
				  </div>

				  <div class="box-body">
					<form action="" method="">
						<div class="row">
							      <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Year</h5>
                                        <div class="controls">
                                          <select name="year_id" id="year_id"  class="form-control">
                                              <option value="" selected='' disabled >-Select Year-</option>
                                              @foreach($years as $key => $year)
                                                    <option value="{{$year->id}}">{{$year->name}}</option>
                                              @endforeach                                            
                                          </select>                                  
                                        </div>
                                    </div>
                                </div>
                               <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Class</h5>
                                        <div class="controls">
                                          <select name="class_id" id="class_id"  class="form-control">
                                              <option value="" selected='' disabled >-Select Class-</option>
                                                @foreach($classes as $key => $class)
                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                              @endforeach     
                                          </select>                                  
                                        </div>
                                    </div>
                                </div>
                               <div class="col-md-4" style="padding-top:25px;">
                                    <input type="submit" name="search" value="Search" class="btn btn-rounded  btn-dark mb-5" />
                                </div>
						</div>
					</form>
				  </div>
				</div>

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Students List</h3>
                  <a href="{{route('student_registration.create')}}" class="btn btn-rounded btn-success mb-5 float-right">Add Student </a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th style="width: 25px">ID</th>
								<th>Name</th>				
								<th>ID No</th>				
								<th class="text-center">Action</th>								
							</tr>
						</thead>
						<tbody>
                            @foreach($model as $key => $value)

                            	<tr>
                                <td>{{$key+1}}</td>
								<td>{{ $value->name}}</td>
								<td>{{ $value->id_no}}</td>
                                <td>
                                    <div class="text-center">
                                    <a href="{{route('student_registration.edit',$value->id)}}" class="btn btn-circle btn-info btn-xs"><i class="fa fa-pencil"></i></a>

                                    <a href="{{ route('student_registration.delete',$value->id) }}" class="btn btn-circle btn-danger btn-xs ml-3" id="delete"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
								
							</tr>
                                
                            @endforeach					
							
						</tbody>
						<tfoot>
						
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
    
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->

@endsection