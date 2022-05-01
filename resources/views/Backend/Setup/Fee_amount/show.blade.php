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
				  <h3 class="box-title"> Fee Amount Details </h3>                
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <h4><strong>Fee Category  : </strong>{{ $data[0]->fee_category->name  }}</h4>
					<div class="table-responsive">
					  <table  class="table table-bordered table-striped">
						<thead class="thead-light">
							<tr>
                                <th>ID</th>
								<th>Class name</th>	
								<th>Amount</th>						
							</tr>
						</thead>
						<tbody>
                            @foreach($data as $key => $value)

                            	<tr>
                                <td>{{$key+1}}</td>
								<td>{{ $value->student_class->name}}</td>
								<td>{{ $value->amount}}</td>                             
								
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