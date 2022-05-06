    @extends('Admin.admin_master')

    @section('content')
    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Attendance</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('employee_attendance.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Attendance date<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="date" class="form-control" value="{{ $models[0]->date }}" />
                                                            @error('date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2" class="text-center" style="vertical-align: middle;">ID</th>
                                                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Emp No</th>
                                                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Employees</th>
                                                                <th colspan="3" class="text-center" style="vertical-align: middle ;width:40%;">
                                                                    Attendance Status</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center btn present_all" style="display: table-cell; background-color:#000000;">
                                                                    Present</th>
                                                                <th class="text-center btn leave_all" style="display: table-cell; background-color:#000000;">
                                                                    On Leave</th>
                                                                <th class="text-center btn absent_all" style="display: table-cell; background-color:#000000;">
                                                                    Absent</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($models as $key => $model)
                                                            <tr class="text-center" id="div{{ $model->id }}">
                                                                <input type="hidden" name="employee_id[]" value="{{ $model->employee_id }}">
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $model->user->id_no }}</td>
                                                                <td>{{ $model->user->name }}</td>
                                                                <td colspan="3">
                                                                    <div class="switch-toggle switch-3 switch-candy">

                                                                        <input name="attendance_status{{ $key }}" type="radio" id="present{{ $key }}" value="Present" {{ $model->attendance_status == 'Present' ? 'checked' : '' }} />

                                                                        <label for="present{{ $key }}">Present</label>

                                                                        <input name="attendance_status{{ $key }}" type="radio" id="leave{{ $key }}" value="Leave" {{ $model->attendance_status == 'Leave' ? 'checked' : '' }} />

                                                                        <label for="leave{{ $key }}">On
                                                                            Leave</label>


                                                                        <input name="attendance_status{{ $key }}" type="radio" id="absent{{ $key }}" value="Absent" {{ $model->attendance_status == 'Absent' ? 'checked' : '' }} />


                                                                        <label for="absent{{ $key }}">Absent</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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
