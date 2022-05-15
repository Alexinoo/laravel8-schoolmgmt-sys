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
                            <h3 class="box-title">Grade Marks List</h3>
                            <a href="{{route('marks_grade.create')}}" class="btn btn-rounded btn-success mb-5 float-right">Add grade marks</a>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">ID</th>
                                            <th>Grade</th>
                                            <th>Point</th>
                                            <th>Start Mark</th>
                                            <th>End Mark</th>
                                            <th>Point Range</th>
                                            <th>Remark</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($model as $key => $value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $value->grade_name}}</td>
                                            <td>{{ number_format( (float)$value->grade_point, 2 )}}</td>
                                            <td>{{ $value->start_marks}}</td>
                                            <td>{{ $value->end_marks}}</td>
                                            <td>{{ $value->start_point}} - {{ $value->end_point}}</td>
                                            <td>{{ $value->remarks}}</td>
                                            <td>
                                                <div class="text-center">

                                                    <a title="Edit Grade" href="{{route('marks_grade.edit',$value->id)}}" class="btn btn-circle btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                                </div>
                                            </td>

                                        </tr>

                                        @endforeach

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
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
