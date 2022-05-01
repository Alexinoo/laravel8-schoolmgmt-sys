@extends('Admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">      

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Fee Amount</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('fee_category_amount.store')}}" method="POST">
                     @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="add-item">
                            
                                 <div class="form-group">
                                        <h5>Fee Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="fee_category_id" id="fee_category_id" required class="form-control">
                                                <option value="" selected="" disabled>-Select fee category-</option>
                                                @foreach($fee_categories as $key => $value)
                                                <option value="{{$value->id}}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                {{-- Row 1 --}}                                    
                                <div class="row">
                                    <div class="col-md-5">
                                          <div class="form-group">
                                        <h5>Student Class <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="class_id[]" id="class_id" required class="form-control">
                                                <option value="" selected="" disabled>-Select student class-</option>
                                                @foreach($classes as $key => $value)
                                                <option value="{{$value->id}}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                     </div>     
                                    </div>
                                    <div class="col-md-5">
                                     <div class="form-group">
                                        <h5>Amount<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="amount[]" class="form-control"/>
                                             @error('amount')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror                                        
                                        </div>
                                    </div>                 
                                    </div>

                                    <div class="col-md-2" style="padding-top: 25px">
                                        <span class="btn btn-circle btn-success btn-xs addMore"><i class="fa fa-plus-circle"></i></span>
                                      
                                    </div>
                                </div>
                               {{-- End of the row --}}
                            </div>
                            {{-- End add-item --}}
                                  
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

{{-- To be inserted by Jaavascript --}}
<div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

                    {{-- Row 1 --}}
                                        
                    <div class="row">
                        <div class="col-md-5">
                              <div class="form-group">
                                 <h5>Student Class <span class="text-danger">*</span></h5>
                                   <div class="controls">
                                       <select name="class_id[]" id="class_id" required class="form-control">
                                             <option value="" selected="" disabled>-Select student class-</option>
                                                  @foreach($classes as $key => $value)
                                                      <option value="{{$value->id}}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>     
                                        </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <h5>Amount<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="number" name="amount[]" class="form-control"/>
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