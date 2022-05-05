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
				  <h3 class="box-title">Salary History</h3>
                  <br><br>
                    <h5><strong>Employee Name : {{$user->name}}</strong></h5>
                    <h5><strong>Employee No : {{$user->id_no}}</strong></h5>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table class="table table-bordered table-striped">
						<thead class="thead-light">
							<tr>
                                <th width = "5%">ID</th>
								<th>Previous Salary</th>				
								<th>Increment</th>			
								<th>Current Salary</th>			
								<th>WEF Date</th>							
							</tr>
						</thead>
						<tbody>
                            @foreach($salaryHist as $key => $value)

                            	<tr>
                                <td>{{$key+1}}</td>
								<td>{{ $value->previous_salary}}</td>
								<td>{{ $value->salary_increment}}</td>
								<td>{{ $value->current_salary}}</td>
								<td>{{ date('d-m-Y',strtotime($value->wef)) }}</td>		
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