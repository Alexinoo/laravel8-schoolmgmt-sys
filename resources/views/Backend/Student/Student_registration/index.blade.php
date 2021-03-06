@extends('Admin.admin_master')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
	
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-12">
			  <div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Search</strong></h4>
				  </div>

				  <div class="box-body">
					<form action="{{ route('search_by_year_class_wise') }}" method="GET">
						<div class="row">
							      <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Year</h5>
                                        <div class="controls">
                                          <select name="year_id" id="year_id"  class="form-control">
                                              <option value="" selected='' disabled >Search By Year</option>
                                              @foreach($years as $key => $year)
                                                    <option value="{{$year->id}}" {{ ( $year_id == $year->id )? 'selected' :''}} >{{$year->name}}</option>
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
                                              <option value="" selected='' disabled >Search By Class</option>
                                                @foreach($classes as $key => $class)
                                                    <option value="{{$class->id}}" {{ ( $class_id == $class->id )? 'selected' :''}}>{{$class->name}}</option>
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
					@if(!@search)
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th style="width: 25px">ID</th>
								<th>Name</th>				
								<th>Reg no</th>				
								<th>Roll</th>				
								<th>Year</th>				
								<th>Class</th>				
								<th>Image</th>	
								@if(Auth::user()->role == 'Admin')			
								<th>Code</th>		
								@endif		
								<th class="text-center">Action</th>								
							</tr>
						</thead>
						<tbody>
                            @foreach($model as $key => $value)

                            	<tr>
                                <td>{{$key+1}}</td>
								<td>{{ $value->user->name}}</td>
								<td>{{ $value->user->id_no}}</td>
								<td>{{ $value->roll}}</td>
								<td>{{ $value->year->name}}</td>
								<td>{{ $value->class->name}}</td>
								<td>
									  <img src={{ !empty($value->user->image)? asset('uploads/student_images/'.$value->user->image)
                                            :asset('uploads/no_image.jpg')
                                            }}
                                             id = "showImage" alt="" style="width:80px;height:80px;border:1px solid #f15025" />
								</td>
								<td>{{ $value->user->code}}</td>
                                <td>
                                    <div class="text-center">
                                    <a href="{{route('student_registration.edit',$value->student_id)}}" class="btn btn-circle btn-info btn-xs"><i class="fa fa-pencil"></i></a>

                                    <a href="{{ route('student_registration.promotion',$value->student_id) }}" class="btn btn-circle btn-success btn-xs ml-3" ><i class="fa fa-line-chart"></i></a>

									   <a href="{{ route('student_pdf',$value->student_id) }}" target = "_blank" class="btn btn-circle btn-primary btn-xs ml-3"><i class="fa fa-file-pdf-o"></i></a>
                                    </div>
                                </td>
								
							</tr>
                                
                            @endforeach					
							
						</tbody>
						<tfoot>
						
						</tfoot>
					  </table>
					  @else
					   <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th style="width: 25px">ID</th>
								<th>Name</th>				
								<th>Reg no</th>				
								<th>Roll</th>				
								<th>Year</th>				
								<th>Class</th>				
								<th>Image</th>	
								@if(Auth::user()->role == 'Admin')			
								<th>Code</th>		
								@endif		
								<th class="text-center">Action</th>								
							</tr>
						</thead>
						<tbody>
                            @foreach($model as $key => $value)

                            	<tr>
                                <td>{{$key+1}}</td>
								<td>{{ $value->user->name}}</td>
								<td>{{ $value->user->id_no}}</td>
								<td>{{ $value->roll}}</td>
								<td>{{ $value->year->name}}</td>
								<td>{{ $value->class->name}}</td>
								<td>
									  <img src=
									  {{ !empty($value->user->image)? asset('uploads/student_images/'.$value->user->image) : asset('uploads/no_image.jpg')
                                            }}
                                             id = "showImage" alt="" style="width:80px;height:80px;border:1px solid #f15025" />
								</td>
								<td>{{ $value->user->code}}</td>
                                <td>
                                    <div class="text-center">
                                    <a href="{{route('student_registration.edit',$value->student_id)}}" class="btn btn-circle btn-info btn-xs"><i class="fa fa-pencil"></i></a>

                                    <a href="{{ route('student_registration.promotion',$value->student_id) }}" class="btn btn-circle btn-success btn-xs ml-3"><i class="fa fa-line-chart"></i></a>

                                    <a href="{{ route('student_pdf',$value->student_id) }}"  target = "_blank" class="btn btn-circle btn-primary btn-xs ml-3"><i class="fa fa-file-pdf-o"></i></a>
                                    </div>
                                </td>
								
							</tr>
                                
                            @endforeach					
							
						</tbody>
						<tfoot>
						
						</tfoot>
					  </table>

					  @endif
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