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
				  <h3 class="box-title">Subject Marks </h3>                
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <h4><strong>Class : </strong>{{ $data[0]->student_class->name  }}</h4>
					<div class="table-responsive">
					  <table  class="table table-bordered table-striped">
						<thead class="thead-light">
							<tr>
                                <th>ID</th>
								<th>Subject</th>			
								<th>Full mark</th>			
								<th>Pass mark</th>			
								<th>Subjective mark</th>			
							</tr>
						</thead>
						<tbody>
                            @foreach($data as $key => $value)

                            	<tr>
                                <td>{{$key+1}}</td>
								<td>{{ $value->school_subject->name}}</td>
								<td>{{ $value->full_mark}}</td>
								<td>{{ $value->pass_mark}}</td>
								<td>{{ $value->subjective_mark}}</td>
								
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