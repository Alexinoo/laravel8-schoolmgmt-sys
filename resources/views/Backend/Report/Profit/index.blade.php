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
                            <h4 class="box-title">Manage <strong>Monthly - Yearly Profit</strong></h4>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Start Date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="start_date" id="start_date" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>End Date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="end_date" id="end_date" class="form-control" />
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4" style="padding-top:25px;">
                                    <a id="search" class="btn btn-primary" name="search">Search</a>
                                </div>
                            </div>

                            {{-- /////////////////////////////  Report - Monthly Profit ///////////////////////// --}}


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
                                                        <tr>
                                                            @{{{tdsource }}}
                                                        <tr>                                           
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



{{-- ============ Get  Report - Monthly Profit And View Page =================== --}}

@section('scripts')
<script type="text/javascript">
    $(document).on('click', '#search', function() {

        $.ajax({
            url: "{{ route('GetProfitReportDatewise')}}"
            , type: "GET"
            , data: {
                start_date: $('#start_date').val()
                , end_date: $('#end_date').val()
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

{{-- ============ End Script Report - Monthly Profit ================= --}}
