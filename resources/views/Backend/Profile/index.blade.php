@extends('Admin.admin_master')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		
		<!-- Main content -->
		<section class="content">

		  <div class="row">

			  <div class="col-12">	
                  
				 <div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black" >
					  <h3 class="widget-user-username">Username : {{ $user->name }}</h3>
					  <h6 class="widget-user-desc">Role : {{ $user->user_type ==0 ? 'User' : 'Admin' }}</h6>
                        <a href="{{route('edit.profile')}}" class="btn btn-rounded btn-success mb-5 float-right">Edit Profile</a>
					  <h6 class="widget-user-desc">Email : {{ $user->email }}</h6>
                       
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{ isset($user->image) ? asset('uploads/user_images/'.$user->image) : asset('uploads/no_image.jpg')}}" alt="User Avatar">
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">Phone</h5>
							<span class="description-text">{{$user->phone }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">Address</h5>
							<span class="description-text">{{ $user->address }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">Gender</h5>
							<span class="description-text">{{$user->gender}}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>		

			  </div>

	  
		  </div>
		  <!-- /.row -->

		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

@endsection