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
                            <h4 class="box-title">Edit <strong>Marks Entry</strong></h4>
                        </div>

                        <div class="box-body">
                            <form action="{{ route('marks_entry.update') }}" method="post">
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
                                            <h5>Subject</h5>
                                            <div class="controls">
                                                <select name="subject_id" id="subject_id" class="form-control">
                                                    <option value="" selected=''>Select subject</option>
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
                                        <a id="search" class="btn btn-primary" name="search">Search</a>
                                    </div>
                                </div>

                                {{-- ///////////////////////////// Marks Entry ///////////////////////// --}}

                                <div class="row d-none" id="marks-entry">

                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>ID NO</th>
                                                    <th>Name</th>
                                                    <th>Father Name</th>
                                                    <th>Gender</th>
                                                    <th>Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody id="marks-entry-tr">

                                            </tbody>
                                        </table>
                                        <input type="submit" value="Update" class="btn btn-rounded btn-primary">

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

@section('scripts')

{{-- ===== Start Roll Generated =========== --}}

<script type="text/javascript">
    $(document).on('click', '#search', function() {

        $.ajax({
            url: "{{ route('getStudentMarksForUpdate')}}"
            , type: "GET"
            , data: {
                year_id: $('#year_id').val()
                , class_id: $('#class_id').val()
                , subject_id: $('#subject_id').val()
                , exam_type_id: $('#exam_type_id').val()
            }
            , success: function(response) {

                $('#marks-entry').removeClass('d-none');

                var html = '';
                $.each(response, function(key, value) {
                    html += `<tr>
                                <td>${value.user.id_no}
                                    <input type="hidden" name="student_id[]" value="${value.student_id}" />
                                    <input type="hidden" name="id_no[]" value="${value.user.id_no}" />
                                    </td>
                                <td>${value.user.name}</td>
                                <td>${value.user.father_name}</td>
                                <td>${value.user.gender}</td>
                                <td><input type="text" class="form-control form-control-sm" name="marks[]" value="${value.marks}"></td>

                                </tr>`;
                });
                $('#marks-entry-tr').html(html);
            }
        });
    });

</script>


{{-- ///////////////////////////
/// Populate Subjects once a class is selected 
////////////////////////////////////////////////////--}}

<script type="text/javascript">
    $(function() {
        $(document).on('change', '#class_id', function() {
            $.ajax({
                url: "{{ route('fetchSubjects') }}"
                , type: "GET"
                , data: {
                    class_id: $('#class_id').val()

                }
                , success: function(response) {
                    let html = `<option value="">Select Subject</option>`;
                    $.each(response, function(key, value) {
                        html += `<option value="${value.id}">${value.school_subject.name}</option>`;
                    });
                    $('#subject_id').html(html);
                }
            });
        });
    });

</script>

{{-- ///////////////////////////
/// End of Populate Subjects once a class is selected 
////////////////////////////////////////////////////--}}



@endsection
