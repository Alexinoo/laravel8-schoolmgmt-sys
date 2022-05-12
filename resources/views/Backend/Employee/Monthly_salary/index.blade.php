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
                            <h4 class="box-title">Employee <strong>Monthly Salary</strong></h4>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Attendance Date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" id="date" class="form-control" />
                                            @error('date')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6" style="padding-top:25px;">
                                    <a id="search" class="btn btn-primary" name="search">Search</a>
                                </div>
                            </div>

                            {{-- ///////////////////////////// Monthly Salary  ///////////////////////// --}}

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



{{-- ============ Get Employee Monthly Salary And View Page =================== --}}
@section('scripts')
<script type="text/javascript">
    $(document).on('click', '#search', function() {

        $.ajax({
            url: "{{ route('fetchEmpMonthlySal')}}"
            , type: "GET"
            , data: {
                date: $('#date').val()
            }
            , beforeSend: function() {}
            , success: function(response) {
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

{{-- ============ End Script Employee Monthly Salary ================= --}}
