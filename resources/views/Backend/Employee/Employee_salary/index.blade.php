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
				  <h3 class="box-title">Employee Salary</h3>
              
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
								<th>Joining Date</th>	  
								<th>Salary</th>		
								<th class="text-center">Action</th>								
							</tr>
						</thead>
						<tbody>
                            @foreach($employees as $key => $value)

                            	<tr>
                                <td>{{$key+1}}</td>
								<td>{{ $value->name}}</td>
								<td>{{ $value->id_no}}</td>
								<td>{{ date('d-m-Y',strtotime($value->join_date)) }}</td>
								<td>{{ $value->salary}}</td>
                                <td>
                                    <div class="text-center">
                                    <a title="Increment" href="{{route('employee_salary.increment',$value->id)}}" class="btn btn-circle btn-info btn-xs"><i class="fa fa-plus-circle"></i></a>

                                    <a title="History" href="{{ route('employee_salary.history',$value->id) }}" class="btn btn-circle btn-primary btn-xs ml-3"><i class="fa fa-history"></i></a>
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