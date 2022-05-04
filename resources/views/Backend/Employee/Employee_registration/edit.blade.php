@extends('Admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">      

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Employee </h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('employee_registration.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                     @csrf
					  <div class="row">
						<div class="col-12">

                            {{-- Row 1 --}}
                            <div class="row">
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Employee name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}"/>
                                             @error('name')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Father's name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="father_name" class="form-control" value="{{ $user->father_name }}"/>       
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Mother's name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mother_name" class="form-control" value="{{ $user->mother_name }}"/>
                                             @error('mother_name')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End row 1 --}}

                        {{-- Row 2 --}}
                            <div class="row">
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Phone <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Address<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="address" class="form-control" value="{{ $user->address }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Gender <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                          <select name="gender" id="gender"  class="form-control">
                                              <option value="" selected='' disabled >-select Gender-</option>
                                              <option value="Male" {{($user->gender == 'Male') ? 'selected':'' }}>Male</option>
                                              <option value="Female" {{($user->gender == 'Female') ? 'selected':'' }}>Female</option>
                                          </select>                                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End row 2 --}}

                         {{-- Row 3 --}}
                            <div class="row">
                                   <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Religion <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                          <select name="religion" id="religion"  class="form-control">
                                              <option value="" selected='' disabled >-select Religion-</option>
                                              <option value="Islam" {{($user->religion == 'Islam') ? 'selected':'' }}>Islam</option>
                                              <option value="Hindu" {{($user->religion == 'Hindu') ? 'selected':'' }}>Hindu</option>
                                              <option value="Christian" {{($user->religion == 'Christian') ? 'selected':'' }}>Christian</option>
                                          </select>              
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Date Of Birth <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="dob" class="form-control" value="{{ $user->dob }}"/>
                                                                                 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Designation <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                          <select name="designation_id" id="designation_id"  class="form-control">
                                              <option value="" selected='' disabled >-Select designation-</option>
                                              @foreach($designations as $key => $designation)
                                                <option value="{{$designation->id}}"  {{($user->designation_id == $designation->id) ? 'selected':'' }}>{{$designation->name}}</option>
                                              @endforeach                                            
                                          </select>                                  
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                            {{-- End row 3 --}}

                               {{-- Row 4 --}}
                            <div class="row">
                                @if(!@user)
                                   <div class="col-md-3">
                                     <div class="form-group">
                                        <h5>Salary<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="salary" class="form-control" value="{{ $user->salary }}"/>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                   @if(!@user)
                               <div class="col-md-3">
                                     <div class="form-group">
                                        <h5>Joining Date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="join_date" class="form-control" value="{{ $user->join_date }}"/>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="col-md-3">
                                   	<div class="form-group">
                                        <h5>Profile Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image"  id="image" class="form-control">
                                         </div>                                     
                                    </div>
                                </div>

                                <div class="col-md-3">
                                   	<div class="form-group">
                                          <div class="controls">
                                           <img 
                                           src={{ ($user->image != null)? asset('uploads/employee_images/'.$user->image) 
                                           :asset('uploads/no_image.jpg')}}
                                           
                                           id = "showImage" alt="" style="width:80px;height:80px;border:1px solid #f15025" />
                                         </div>                                     
                                    </div>
                                </div>
                             
                            </div>
                            {{-- End row 4 --}}
                            
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5"value="Update">
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

@section('scripts')
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