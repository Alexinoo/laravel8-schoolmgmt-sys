@extends('Admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">      

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Subject marks</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('assign_subject.update',$data[0]->class_id)}}" method="POST">
                     @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="add-item">
                            
                                 <div class="form-group">
                                        <h5>Class name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="class_id" id="class_id" required class="form-control">
                                                <option value="" selected="" disabled>-Select class name-</option>
                                                @foreach($classes as $class)
                                                <option value="{{$class->id}}" {{ $data[0]->class_id  == $class->id ? 'selected' : ' ' }}>{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                {{-- Row 1 --}}
                                @foreach($data as $key => $value)
                              <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">                              
                                <div class="row">
                                    <div class="col-md-4">
                                          <div class="form-group">
                                        <h5>Student subject <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subject_id[]" id="subject_id" required class="form-control">
                                                <option value="" selected="" disabled>-Select student class-</option>
                                                @foreach($subjects as $key => $subject)
                                                <option value="{{$subject->id}}" {{ $value->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                     </div>     
                                    </div>
                                    <div class="col-md-2">
                                     <div class="form-group">
                                        <h5>Full mark<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="full_mark[]" class="form-control" value="{{ $value->full_mark }}"/>
                                             @error('amount')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror                                        
                                        </div>
                                    </div>                 
                                    </div>
                                    <div class="col-md-2">
                                     <div class="form-group">
                                        <h5>Pass mark<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="pass_mark[]" class="form-control" value="{{ $value->pass_mark }}"/>
                                             @error('amount')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror                                        
                                        </div>
                                    </div>                 
                                    </div>
                                    <div class="col-md-2">
                                     <div class="form-group">
                                        <h5>Subjective mark<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="subjective_mark[]" class="form-control" value="{{ $value->subjective_mark }}"/>
                                             @error('amount')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror                                        
                                        </div>
                                    </div>                 
                                    </div>

                                    <div class="col-md-2" style="padding-top: 25px">
                                        <span class="btn btn-circle btn-success btn-xs addMore"><i class="fa fa-plus-circle"></i></span>
                                          <span class="btn btn-circle btn-danger btn-xs removeMore"><i class="fa fa-minus-circle"></i></span>                                      
                                    </div>
                                </div>
                                </div>
                                 @endforeach       

                               {{-- End of the row --}}
                            </div>
                            {{-- End add-item --}}
                                  
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

{{-- To be inserted by Jaavascript --}}
<div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

                {{-- Row 1 --}}                                        
                    <div class="row">
                           <div class="col-md-4">
                                <div class="form-group">
                                        <h5>School Subject <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subject_id[]" class="form-control">
                                                <option value="" selected="" disabled>-Select subject-</option>
                                                @foreach($subjects as $key => $subject)
                                                <option value="{{$subject->id}}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                               @error('subject_id')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror     
                                        </div>
                                     </div>     
                                    </div>
                                   <div class="col-md-2">
                                          <div class="form-group">
                                        <h5>Full mark<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="full_mark[]" class="form-control"/>
                                             @error('full_mark')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror                                        
                                        </div>
                                    </div>   
                                   </div>

                                   <div class="col-md-2">
                                          <div class="form-group">
                                        <h5>Pass mark<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="pass_mark[]" class="form-control"/>
                                             @error('pass_mark')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror                                        
                                        </div>
                                    </div>   
                                   </div>
                                   <div class="col-md-2">
                                          <div class="form-group">
                                        <h5>Subjective mark<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="subjective_mark[]" class="form-control"/>
                                             @error('subjective_mark')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror                                        
                                        </div>
                                    </div>   
                                   </div>
                             
                                <div class="col-md-2" style="padding-top: 25px">
                                    <span class="btn btn-circle btn-success btn-xs addMore"><i class="fa fa-plus-circle"></i></span>
                                    <span class="btn btn-circle btn-danger btn-xs removeMore"><i class="fa fa-minus-circle"></i></span>
                             </div>
                       </div>
                {{-- End of the row --}}

            </div>
    </div>
</div>
@endsection

@section('scripts')
<script >
    $(document).ready(function(){
        let counter = 0
        $(document).on('click' ,'.addMore',function(){
            console.log('Clicked');
            let whole_extra_item_add = $('#whole_extra_item_add').html()
            $(this).closest('.add-item').append(whole_extra_item_add)
             counter++
        })
        $(document).on('click' ,'.removeMore',function(event){
            $(this).closest('.delete_whole_extra_item_add').remove()
             counter--
        })
    })
</script>
    
@endsection