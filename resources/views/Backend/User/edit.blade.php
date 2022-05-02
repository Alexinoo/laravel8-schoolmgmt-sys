@extends('Admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">      

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Update User</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('update.user',$user->id)}}" method="POST">
            @csrf
					  <div class="row">
						<div class="col-12">	

                            {{-- Row 1 --}}
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <h5>User Role <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="role" id="role" class="form-control">
                                                <option value="" selected="" disabled="" >-Select role-</option>
                                                <option value="Admin"  {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="Operator"  {{ $user->role == 'Operator' ? 'selected' : '' }}>Operator</option>                                              
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    	<div class="form-group">
                                        <h5>Username<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name"  id="name" class="form-control" value="{{$user->name}}">
                                         </div>                                     
                                    </div>
                                </div>

                            </div>    
                            
                            {{-- End of row 1 --}}

                             {{-- Row 2--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Email  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email"  id="email" class="form-control" value="{{$user->email}}"> </div>
                                    </div>                                    
                                </div>

                                <div class="col-md-6">
                                
                                </div>

                            </div>    
                            
                            {{-- End of row 2--}}						
                            
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
    </div>
</div>
@endsection