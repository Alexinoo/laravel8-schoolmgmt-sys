@extends('Admin.admin_master')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
	
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employees List</h3>
                  <a href="{{route('employee_registration.create')}}" class="btn btn-rounded btn-success mb-5 float-right">Add employee</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th width = "5%">ID</th>
								<th>Name</th>				
								<th>Emp ID</th>				
								<th>Phone</th>						
								<th>Gender</th>				
								<th>Joining Date</th>	  
								<th>Salary</th>		
                                   @if(Auth::user()->role == 'Admin')		
								<th>Code</th>	
                                @endif			
								<th class="text-center">Action</th>								
							</tr>
						</thead>
						<tbody>
                            @foreach($employees as $key => $value)

                            	<tr>
                                <td>{{$key+1}}</td>
								<td>{{ $value->name}}</td>
								<td>{{ $value->id_no}}</td>
								<td>{{ $value->phone}}</td>
								<td>{{ $value->gender}}</td>
								<td>{{ $value->join_date}}</td>
								<td>{{ $value->salary}}</td>
                                
                                @if(Auth::user()->role == 'Admin')		
									<td>{{ $value->code}}</td>
                                @endif		
							
                                <td>
                                    <div class="text-center">
                                    <a href="{{route('employee_registration.edit',$value->id)}}" class="btn btn-circle btn-info btn-xs"><i class="fa fa-pencil"></i></a>

                                    <a href="{{ route('employee_pdf',$value->id) }}"  target = "_blank" class="btn btn-circle btn-primary btn-xs ml-3"><i class="fa fa-file-pdf-o"></i></a>
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