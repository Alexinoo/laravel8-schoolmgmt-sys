@extends('Admin.admin_master')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
	
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-12">
			  <div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Generate Roll</strong></h4>
				  </div>

				  <div class="box-body">
					<form action="{{ route('generate_roll.store') }}" method="post">
                        @csrf
						<div class="row">
							      <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Year</h5>
                                        <div class="controls">
                                          <select name="year_id" id="year_id"  class="form-control">
                                              <option value="" selected='' disabled >Search By Year</option>
                                              @foreach($years as $key => $year)
                                                    <option value="{{$year->id}}">{{$year->name}}</option>
                                              @endforeach                                            
                                          </select>                                  
                                        </div>
                                    </div>
                                </div>
                               <div class="col-md-4">
                                     <div class="form-group">
                                        <h5>Class</h5>
                                        <div class="controls">
                                          <select name="class_id" id="class_id"  class="form-control">
                                              <option value="" selected='' disabled >Search By Class</option>
                                                @foreach($classes as $key => $class)
                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                              @endforeach     
                                          </select>                                  
                                        </div>
                                    </div>
                                </div>
                               <div class="col-md-4" style="padding-top:25px;">
                                    <a id="search" class="btn btn-primary" name="search">Search</a>
                                </div>
						</div>

                {{-- ///////////////////////////// ROLLL GENERATE TABLE ///////////////////////// --}}

                        <div class="row d-none" id="roll-generate">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>ID NO</th>
                                            <th>Name</th>
                                            <th>Father Name</th>
                                            <th>Gender</th>
                                            <th>Roll</th>
                                        </tr>
                                    </thead>
                                    <tbody id="roll-generate-tr">

                                    </tbody>
                                </table>
                            </div>                            
                        </div>

                    <input type="submit" value="Roll Generator" class="btn btn-info" />
					</form>
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

@section('scripts')

{{-- ===== Start Roll Generated =========== --}}

<script type="text/javascript">
  $(document).on('click','#search',function(){
 
    let data = 

     $.ajax({
      url: "{{ route('fetch_students')}}",
      type: "GET",
      data : {
        year_id : $('#year_id').val(),
        class_id : $('#class_id').val()
    },
      success: function (response) {

        $('#roll-generate').removeClass('d-none');

        var html = '';
        $.each( response, function(key, value){
                html += `<tr>
                                <td>${value.user.id_no}<input type="hidden" name="student_id[]" value="${value.student_id}" /></td>
                                <td>${value.user.name}</td>
                                <td>${value.user.father_name}</td>
                                <td>${value.user.gender}</td>
                                <td><input type="text" class="form-control form-control-sm" name="roll[]" value="${value.roll}"></td>
                                </tr>`;
        });
        html = $('#roll-generate-tr').html(html);
      }
    });
  });

</script>
{{-- ============ End Script Roll Generate ================= --}}

    
@endsection