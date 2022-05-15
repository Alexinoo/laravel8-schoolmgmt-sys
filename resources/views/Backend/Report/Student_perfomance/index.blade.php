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
                            <h4 class="box-title"> <strong>Student Perfomance Report</strong></h4>
                        </div>

                        <div class="box-body">
                            <form action="{{ route('student_perfomance.get') }}" method="GET" target="_blank">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Year</h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option value="" selected='' disabled>Select Year</option>
                                                    @foreach($years as $key => $year)
                                                    <option value="{{$year->id}}">{{$year->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Class</h5>
                                            <div class="controls">
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option value="" selected='' disabled>Select Class</option>
                                                    @foreach($classes as $key => $class)
                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Exam Type</h5>
                                            <div class="controls">
                                                <select name="exam_type_id" id="exam_type_id" class="form-control">
                                                    <option value="" selected='' disabled>Select Exam Type</option>
                                                    @foreach($exam_types as $key => $exam_type)
                                                    <option value="{{$exam_type->id}}">{{$exam_type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="padding-top:25px; margin-bottom:10px">
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
