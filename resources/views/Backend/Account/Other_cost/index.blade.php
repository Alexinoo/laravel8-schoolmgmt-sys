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
                            <h3 class="box-title">Other Costs</h3>
                            <a href="{{route('other_cost.create')}}" class="btn btn-rounded btn-success mb-5 float-right">Add other costs</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">ID</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($model as $key => $value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ date('d-m-Y',strtotime($value->date)) }}</td>
                                            <td>{{ $value->amount}}</td>
                                            <td>{{ $value->description}}</td>
                                            <td><img src=" {{ isset($value->image) ? asset('uploads/cost_images/'.$value->image) : asset('uploads/no_image.jpg')}}" alt="Image" style="width:80px;height:80px;border:1px solid #f15025" /></td>
                                            <td>
                                                <div class=" text-center">
                                                    <a href="{{route('other_cost.edit',$value->id)}}" class="btn btn-circle btn-info btn-xs"><i class="fa fa-pencil"></i></a>

                                                    <a href="{{ route('other_cost.delete',$value->id) }}" class="btn btn-circle btn-danger btn-xs ml-3" id="delete"><i class="fa fa-trash"></i></a>

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
