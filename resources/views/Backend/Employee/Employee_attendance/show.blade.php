@extends('Admin.admin_master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Employee Attendance Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Emp No</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Attendance Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($models as $key => $model)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $model->user->id_no}}</td>
                                            <td>{{ $model->user->name}}</td>
                                            <td>{{ date('d-m-Y',strtotime($model->date))}}</td>
                                            <td>{{ $model->attendance_status}}</td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->

@endsection
