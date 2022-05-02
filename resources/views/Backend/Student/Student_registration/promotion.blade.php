@extends('Admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">      

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Student Promotion </h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('student_promotion',$model->student_id)}}" method="POST" enctype="multipart/form-data">
                     @csrf
					  <div class="row">
                          <input type="hidden" name="id" value="{{$model->id}}">
						<div class="col-12">

                            {{-- Row 1 --}}
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <h5>Student name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" readonly value="{{$model->user->name}}"/>
                                             @error('name')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <h5>Discount </h5>
                                        <div class="controls">
                                            <input type="number" name="discount" class="form-control"  min="1" max="100"/>
                                             @error('discount')
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
                                        <h5>Year <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                          <select name="year_id" id="year_id"  class="form-control">
                                              <option value="" selected='' disabled >-Select Year-</option>
                                              @foreach($years as $key => $year)
                                                <option value="{{$year->id}}" {{ $model->year_id == $year->id ? 'selected':'' }}>{{$year->name}} </option>
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
                                                 <option value="{{$class->id}}" {{ $model->class_id == $class->id ? 'selected':'' }}>{{$class->name}}</option>
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
                                                    <option value="{{$group->id}}" {{ $model->group_id == $group->id ? 'selected':'' }} >{{$group->name}}</option>
                                              @endforeach     
                                          </select>                       
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                            {{-- End row 2 --}}

                           {{-- Row 5 --}}
                            <div class="row">
                                   <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Shift <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                          <select name="shift_id" id="shift_id"  class="form-control">
                                              <option value="" selected='' disabled >-Select Shift-</option>
                                              @foreach($shifts as $key => $shift)
                                                    <option value="{{$shift->id}}"  {{ $model->shift_id == $shift->id ? 'selected':'' }} >{{$shift->name}}</option>
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
                                           <img src={{ !empty($model->user->image)? asset('uploads/student_images/'.$model->user->image)
                                            :asset('uploads/no_image.jpg')
                                            }}
                                             id = "showImage" alt="" style="width:80px;height:80px;border:1px solid #f15025" />
                                         </div>                                     
                                    </div>
                                </div>
                             
                            </div>
                            {{-- End row 5 --}}                       
                            
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-success mb-5"value="Promotion">
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