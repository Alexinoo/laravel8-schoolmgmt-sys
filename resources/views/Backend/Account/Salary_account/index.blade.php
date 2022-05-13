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
                            <h3 class="box-title">Employee Salary List</h3>
                            <a href="{{route('salaries.create')}}" class="btn btn-rounded btn-success mb-5 float-right">Pay Employee </a>



                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">ID</th>
                                            <th>Reg No</th>
                                            <th>Employee Name</th>
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
                                            <td>{{ $value->amount}}</td>
                                            <td>{{ date('M Y',strtotime($value->date))}}</td>
                                            <td>
                                                <div class="text-center">

                                                    <a title="Edit Employee Pay" href="{{route('salaries.edit',$value->id)}}" class="btn btn-circle btn-info btn-xs"><i class="fa fa-pencil"></i></a>
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
