@extends('Admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Grade Marks </h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('marks_grade.update' , $model->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        {{-- Row 1 --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Grade name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="grade_name" class="form-control" value="{{$model->grade_name}}" />

                                                        @error('grade_name')
                                                        <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Grade Point <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="grade_point" class="form-control" value="{{$model->grade_point}}" />

                                                        @error('grade_point')
                                                        <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Start marks <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="start_marks" class="form-control" value="{{$model->start_marks}}" />

                                                        @error('start_marks')
                                                        <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End row 1 --}}

                                        {{-- Row 2 --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>End mark <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="end_marks" class="form-control" value="{{$model->end_marks}}" />

                                                        @error('end_marks')
                                                        <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Start Point <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="start_point" class="form-control" value="{{$model->start_point}}" />

                                                        @error('start_point')
                                                        <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>End Point <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="end_point" class="form-control" value="{{$model->end_point}}" />
                                                        @error('end_point')
                                                        <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- End row 2 --}}

                                        {{-- Row 3 --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Remarks <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="remarks" class="form-control" value="{{$model->remarks}}" />
                                                        @error('remarks')
                                                        <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        {{-- End of Row 3 --}}

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">

                                            <a href="{{route('marks_grade.index')}}" class="btn btn-rounded btn-secondary mb-5 ml-4">Manage</a>
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
