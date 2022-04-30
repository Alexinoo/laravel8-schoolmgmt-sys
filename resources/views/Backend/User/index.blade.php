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
				  <h3 class="box-title">Users List</h3>
                  <a href="{{route('add.user')}}" class="btn btn-rounded btn-success mb-5 float-right">Add User</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>ID</th>
                                <th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th>Profile photo</th>								
								<th>Action</th>								
							</tr>
						</thead>
						<tbody>
                            @foreach($users as $key => $value)

                            	<tr>
                                <td>{{$key+1}}</td>
                                <td>{{ ($value->user_type == 0) ? 'user' : 'Admin' }}</td>
								<td>{{ $value->name}}</td>
								<td>{{ $value->email}}</td>
								<td><img src="{{url('storage/'.$value->profile_photo_path)}}" alt="Profile" style="width: 50px;height:50px"/></td>
                                <td>
                                    <div class="text-center">
                                    <a href="{{route('edit.user',$value->id)}}" class="btn btn-circle btn-info btn-xs"><i class="fa fa-pencil"></i></a>

                                    <a href="{{ route('delete.user',$value->id) }}" class="btn btn-circle btn-danger btn-xs ml-3" id="delete"><i class="fa fa-trash"></i></a>
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