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
                            <h4 class="box-title">Generate <strong>Attendance Report</strong></h4>
                        </div>

                        <div class="box-body">
                            <form action="{{ route('attendance_report.get') }}" method="GET" target="_blank">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Employee Name</h5>
                                            <div class="controls">
                                                <select name="employee_id" id="employee_id" class="form-control">
                                                    <option value="" selected='' disabled>Select employee</option>
                                                    @foreach($employees as $key => $employee)
                                                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Date</h5>
                                            <div class="controls">
                                                <input type="date" name="date" id="date" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4" style="padding-top:25px; margin-bottom:10px">
                                        <input type="submit" value="Search" class="btn btn-rounded btn-primary">
                                    </div>
                                </div>
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
