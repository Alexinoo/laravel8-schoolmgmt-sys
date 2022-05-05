@extends('Admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">      

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Leave Request Details</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('employee_leave.store')}}" method="POST">
                     @csrf
					  <div class="row">
						<div class="col-12">

                            {{-- Row 1 --}}
                        <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                                        <h5>Employee <span class="text-danger">*</span> </h5>
                                        <div class="controls">
                                            <select name="employee_id" id="employee_id" class="form-control">
                                                <option value="">-select employee-</option>
                                                @foreach($employees as $key => $employee)
                                                       <option value="{{$employee->id}}">{{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                              @error('employee_id')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                                                              
                                        </div>
                                    </div>
                           </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                        <h5>Reason <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                                <select name="leave_purpose_id" id="leave_purpose_id" class="form-control">
                                                <option value="" disabled selected=''>-select leave purpose-</option>
                                                @foreach($leave_purpose as $key => $purpose)
                                                       <option value="{{$purpose->id}}">{{$purpose->name}}</option>
                                                @endforeach
                                                <option value="0">New Purpose</option>
                                            </select>

                                            <input type="text" name="name" id="add_purpose" class="form-control mt-3" placeholder="new purpose"  style="display: none;"/>

                                                @error('leave_purpose_id')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                                                              
                                        </div>
                                    </div>
                            </div>
                         </div>

                          {{-- Row 2 --}}

                            <div class="row">
                                <div class="col-md-6">
                                       <div class="form-group">
                                        <h5>Apply From<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="applied_from" class="form-control"/>
                                            @error('applied_from')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Apply To<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="applied_to" class="form-control"/>
                                            @error('applied_to')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>                               
                                </div>
                            </div>                        
                            {{-- End of Row 2 --}}
                            
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
    
    $(document).on('change' ,'#leave_purpose_id', function () {
        
        let leavePurposeId = $(this).val()

        if(leavePurposeId == 0) {

            $('#add_purpose').show()
        }else{
             $('#add_purpose').hide()
        }

    })
})

</script>
    
@endsection