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
                            <h3 class="box-title">Student Fees List</h3>
                            <a href="{{route('student_fee.create')}}" class="btn btn-rounded btn-success mb-5 float-right">Add /Edit Student Fee</a>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">ID</th>
                                            <th>Reg No</th>
                                            <th>Student Name</th>
                                            <th>Year</th>
                                            <th>Class</th>
                                            <th>Fee Type</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($model as $key => $value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $value->user->id_no}}</td>
                                            <td>{{ $value->user->name}}</td>
                                            <td>{{ $value->year->name}}</td>
                                            <td>{{ $value->class->name}}</td>
                                            <td>{{ $value->fee_category->name}}</td>
                                            <td>{{ $value->amount}}</td>
                                            <td>{{ date('M Y',strtotime($value->date))}}</td>
                                            <td>
                                                <div class="text-center">

                                                    <a title="Edit Student Fee" href="{{route('student_fee.edit',$value->id)}}" class="btn btn-circle btn-info btn-xs"><i class="fa fa-pencil"></i></a>
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
