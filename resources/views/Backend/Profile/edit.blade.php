@extends('Admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">      

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Update Profile</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('store.profile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
					  <div class="row">
						<div class="col-12">

                             {{-- Row 1--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Username  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name"  id="name" class="form-control" value="{{$user->name}}"> </div>
                                    </div>                                    
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Email  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email"  id="email" class="form-control" value="{{$user->email}}"> </div>
                                    </div>   
                                </div>

                            </div>    
                            
                            {{-- End of row 1--}}			

                              {{-- Row 2--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Phone  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="phone"  id="phone" class="form-control" value="{{$user->phone}}"> </div>
                                    </div>                                    
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Address  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="address"  id="address" class="form-control" value="{{$user->address}}"> </div>
                                    </div>   
                                </div>

                            </div>    
                            
                            {{-- End of row 2--}}		
                            
                              {{-- Row 3 --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Gender <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="" selected="" disabled="" >-Select gender-</option>
                                                <option value="Male"  {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female"  {{ $user->gender == 'Female'? 'selected' : '' }}>Female</option>                                              
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    	<div class="form-group">
                                        <h5>Profile Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image"  id="image" class="form-control">
                                         </div>                                     
                                    </div>
                                    	<div class="form-group">
                                          <div class="controls">
                                           <img src={{ isset($user->image) ? asset('uploads/user_images/'.$user->image) : asset('uploads/no_image.jpg')}} id = "showImage" alt="" style="width:80px;height:80px;border:1px solid #f15025" />
                                         </div>                                     
                                    </div>
                                </div>

                            </div>    
                            
                            {{-- End of row 3 --}}
                            
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

@section('script')
    <script type="text/javascript">
    $(document).ready(function () {
        
        $('#image').change(function(e){
            let reader = new FileReader()
            reader.onload = function (e) {
                 $('#showImage').attr('src',e.target.result)
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })

    </script>
@endsection