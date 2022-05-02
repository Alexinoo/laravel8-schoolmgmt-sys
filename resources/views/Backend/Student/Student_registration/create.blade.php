@extends('Admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">      

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Student </h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('student_registration.store')}}" method="POST" enctype="multipart/form-data">
                     @csrf
					  <div class="row">
						<div class="col-12">

                            {{-- Row 1 --}}
                            <div class="row">
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Student name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control"/>
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
                                            <input type="text" name="father_name" class="form-control"/>       
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Mother's name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mother_name" class="form-control"/>
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
                                            <input type="text" name="phone" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Address<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="address" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Gender <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                          <select name="gender" id="gender"  class="form-control">
                                              <option value="" selected='' disabled >-select Gender-</option>
                                              <option value="Male">Male</option>
                                              <option value="Female">Female</option>
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
                                              <option value="Islam">Islam</option>
                                              <option value="Hindu">Hindu</option>
                                              <option value="Christian">Christian</option>
                                          </select>              
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Date Of Birth <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="dob" class="form-control"/>
                                                                                 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Discount<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="discount" min="1" max="100" class="form-control"/>              
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                            {{-- End row 3 --}}

                               {{-- Row 4 --}}
                            <div class="row">
                                   <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Year <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                          <select name="year_id" id="year_id"  class="form-control">
                                              <option value="" selected='' disabled >-Select Year-</option>
                                              @foreach($years as $key => $year)
                                                <option value="{{$year->id}}">{{$year->name}}</option>
                                              @endforeach                                            
                                          </select>                                  
                                        </div>
                                    </div>
                                </div>
                               <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Class <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                          <select name="class_id" id="class_id"  class="form-control">
                                              <option value="" selected='' disabled >-Select Class-</option>
                                                @foreach($classes as $key => $class)
                                                 <option value="{{$class->id}}">{{$class->name}}</option>
                                              @endforeach     
                                          </select>              
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Group <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                          <select name="group_id" id="group_id"  class="form-control">
                                              <option value="" selected='' disabled >-Select Group-</option>
                                            @foreach($groups as $key => $group)
                                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                              @endforeach     
                                          </select>                       
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                            {{-- End row 4 --}}

                           {{-- Row 5 --}}
                            <div class="row">
                                   <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Shift <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                          <select name="shift_id" id="shift_id"  class="form-control">
                                              <option value="" selected='' disabled >-Select Shift-</option>
                                              @foreach($shifts as $key => $shift)
                                                    <option value="{{$shift->id}}">{{$shift->name}}</option>
                                              @endforeach                                            
                                          </select>                             
                                        </div>
                                    </div>
                                </div>
                               <div class="col-md-4">
                                    	<div class="form-group">
                                        <h5>Profile Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image"  id="image" class="form-control">
                                         </div>                                     
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   	<div class="form-group">
                                          <div class="controls">
                                           <img src={{asset('uploads/no_image.jpg')}} id = "showImage" alt="" style="width:80px;height:80px;border:1px solid #f15025" />
                                         </div>                                     
                                    </div>
                                </div>
                             
                            </div>
                            {{-- End row 5 --}}                       
                            
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5"value="Submit">
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