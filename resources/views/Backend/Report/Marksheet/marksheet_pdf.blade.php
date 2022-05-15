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
                            <h4 class="box-title">Marksheet <strong>PDF View</strong></h4>
                        </div>

                        <div class="box-body" style="border : 1px solid #eee; padding:10px;">

                            {{-- Row 1 --}}
                            <div class="row">
                                <div class="col-md-2 text-center" style="float:right">
                                    <img src="{{ asset('uploads/easyschool.png') }}" alt="" style="width: 100px;height:120px">
                                </div>

                                <div class="col-md-2 text-center">

                                </div>

                                <div class="col-md-4 text-center" style="float:left">
                                    <h4><strong>Easy Learning School</strong></h4>
                                    <h6><strong>Nairobi Kenya</strong></h6>
                                    <h5><strong><u><i>Academic Transcript </i></u></strong></h5>
                                    <h6><strong>{{ $allMarks[0]->exam->name }}</strong></h6>

                                </div>

                                <div class="col-md-12">
                                    <hr style="border:1px solid #ddd; width:100%;margin-bottom:0px">
                                    <p style="text-align: right"><u><i>Print Date : </i>{{ date('d M Y') }}</u></p>
                                </div>
                            </div>
                            {{-- End of row 1 --}}

                            {{-- Row 2 --}}
                            <div class="row">
                                <div class="col-md-6">

                                    <table border="1" style="border-color: 1px solid #f15025;" width="100%" cellpadding="8" cellspacing="2">
                                        @php
                                        $studentReg = App\Models\StudentRegistration::where('year_id',$allMarks[0]->year_id)->where('class_id',$allMarks[0]->class_id)->first();
                                        @endphp

                                        <tr>
                                            <td width="50%">Student ID</td>
                                            <td width="50%">{{$allMarks[0]->id_no}}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Roll No</td>
                                            <td width="50%">{{ $studentReg->roll_no}}</td>

                                        </tr>
                                        <tr>
                                            <td width="50%">Name</td>
                                            <td width="50%">{{$allMarks[0]->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Class</td>
                                            <td width="50%">{{$allMarks[0]->class->name }}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Year</td>
                                            <td width="50%">{{$allMarks[0]->year->name }}</td>

                                        </tr>
                                    </table>
                                </div>

                                <div class="col-md-6">

                                    <table border="1" style="border-color: 1px solid #f15025;" width="100%" cellpadding="8" cellspacing="2">
                                        <thead>
                                            <tr>
                                                <th>Letter Grade</th>
                                                <th>Marks Interval</th>
                                                <th> Grade Point</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($grades as $key => $grade)
                                            <tr>
                                                <td>{{$grade->grade_name}}</td>
                                                <td>{{$grade->start_marks}} - {{$grade->end_marks}}</td>
                                                <td>{{ number_format((float)$grade->grade_point ,2)}} - {{ ($grade->grade_point ==5)? number_format((float)$grade->grade_point ,2) : number_format((float)$grade->grade_point+1 ,2) - (float)0.01}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            {{-- End of row 2--}}

                            {{-- =============================== Start Marksheet ==================== ==================== --}}
                            <br><br>
                            <!-- 3rd row start -->
                            <div class="row">
                                <div class="col-md-12">

                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="1" cellspacing="1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">SL</th>
                                                <th class="text-center">Get Marks</th>
                                                <th class="text-center">Letter Grade</th>
                                                <th class="text-center">Grade Point</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                            $total_marks = 0;
                                            $total_point = 0;
                                            @endphp

                                            @foreach($allMarks as $key => $mark)
                                            @php
                                            $get_mark = $mark->marks;
                                            $total_marks = (float)$total_marks+(float)$get_mark;

                                            $total_subject = App\Models\Student_mark::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get()->count();
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>

                                                <td class="text-center">{{ $get_mark }}</td>

                                                @php

                                                $grade_marks = App\Models\Mark_grade::where([['start_marks','<=', (int)$get_mark],['end_marks', '>=' ,(int)$get_mark ]])->first();

                                                    $grade_name = $grade_marks->grade_name;
                                                    $grade_point = number_format((float)$grade_marks->grade_point,2);
                                                    $total_point = (float)$total_point+(float)$grade_point;
                                                    @endphp
                                                    <td class="text-center">{{ $grade_name }}</td>
                                                    <td class="text-center">{{ $grade_point }}</td>

                                            </tr>
                                            @endforeach

                                            <tr>
                                                <td colspan="3"><strong style="padding-left: 30px;">Total Marks</strong></td>
                                                <td colspan="3"><strong style="padding-left: 38px;">{{ $total_marks }}</strong></td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div> <!-- // end Col md -12    -->
                            </div>
                            <!-- end 3td row start -->



                            <br><br>


                            <!--  4th row start -->
                            <div class="row">

                                <div class="col-md-12">

                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="1" cellspacing="1">
                                        @php
                                        $total_grade = 0;
                                        $point_for_letter_grade = (float)$total_point/(float)$total_subject;
                                        $total_grade = App\Models\Mark_grade::where([['start_point','<=',$point_for_letter_grade],['end_point','>=',$point_for_letter_grade]])->first();


                                            $grade_point_avg = (float)$total_point/(float)$total_subject;

                                            @endphp
                                            <tr>
                                                <td width="50%"><strong>Grade Point Average</strong></td>
                                                <td width="50%">
                                                    @if($countFail > 0)
                                                    0.00
                                                    @else
                                                    {{number_format((float)$grade_point_avg,2)}}
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="50%"><strong>Letter Grade </strong></td>
                                                <td width="50%">
                                                    @if($countFail > 0)

                                                    F
                                                    @else
                                                    {{ $total_grade->grade_name }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%">Total Marks with Fraction</td>
                                                <td width="50%"><strong>{{ $total_marks }}</strong></td>
                                            </tr>

                                    </table>
                                </div>
                            </div>
                            <!--  End 4th row start -->


                            <br><br>

                            <!--  5th row start -->
                            <div class="row">
                                <div class="col-md-12">

                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="1" cellspacing="1">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: left;"><strong>Remarks:</strong>
                                                    @if($countFail > 0)
                                                    Fail
                                                    @else
                                                    {{ $total_grade->remarks }}
                                                    @endif
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--  End 5th row start -->

                            <br><br><br><br>

                            <!--  6th row start -->
                            <div class="row">
                                <div class="col-md-4">
                                    <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
                                    <div class="text-center">Teacher</div>
                                </div>

                                <div class="col-md-4">
                                    <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
                                    <div class="text-center">Parents / Guardian </div>
                                </div>

                                <div class="col-md-4">
                                    <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
                                    <div class="text-center">Principal / Headmaster</div>
                                </div>

                            </div>
                            <!--  End 6th row start -->
                            <br><br>
                            {{-- ========================== End Marksheet =================== --}}


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