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
				  <h3 class="box-title">Student Fee Amount List </h3>
                  <a href="{{route('fee_category_amount.create')}}" class="btn btn-rounded btn-success mb-5 float-right">Add Fee Amount</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>ID</th>
								<th>Fee Category</th>	
								<th class="text-center">Action</th>								
							</tr>
						</thead>
						<tbody>
                            @foreach($data as $key => $value)

                            	<tr>
                                <td>{{$key+1}}</td>
								<td>{{ $value->fee_category->name}}</td>
                                <td>
                                    <div class="text-center">
                                    <a href="{{ route('fee_category_amount.edit',$value->fee_category_id) }}" class="btn btn-circle btn-info btn-xs"><i class="fa fa-pencil"></i></a>

                                    <a href="{{ route('fee_category_amount.show',$value->fee_category_id) }}" class="btn btn-circle btn-primary btn-xs ml-3"><i class="fa fa-eye"></i></a>
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