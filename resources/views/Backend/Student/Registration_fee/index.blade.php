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
					<h4 class="box-title">Student <strong>Registration Fee</strong></h4>
				  </div>

				  <div class="box-body">
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

                {{-- ///////////////////////////// Registration Fee  ///////////////////////// --}}

                        <div class="row">
                            <div class="col-md-12">
                                <div id="documentResults">
                                    <script id="document-template" type="text/x-handlebars-template"> 
                                     <table class="table table-bordered table-striped" style="width: 100%">
                                            <thead>
                                                  <tr>
                                                @{{{thsource }}}
                                                 </tr>
                                            </thead>
                                                <tbody>
                                                  @{{#each this}}
                                                        <tr>
                                                            @{{{tdsource }}}
                                                        </tr>
                                                  @{{/each}}
                                                </tbody>
                                            </table>    
                                        </script>
                                    </div>
                                </div>                            
                            </div>
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



{{-- ============ Get Registration Fee Method And View Page =================== --}}
@section('scripts')
<script type="text/javascript">
  $(document).on('click','#search',function(){
  
     $.ajax({
      url: "{{ route('fetchRegFeeClasswise')}}",
      type: "GET",
      data: {
          year_id : $('#year_id').val(),
          class_id : $('#class_id').val()
        },
      beforeSend: function() {       
      },
      success: function (response) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(response);
        $('#documentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>
@endsection

{{-- ============ End Script Registration Fee ================= --}}

    
