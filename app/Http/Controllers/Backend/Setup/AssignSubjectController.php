<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = AssignSubject::all();
        $data = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('Backend.Setup.Assign_subject.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = StudentClass::all();
        $subjects = SchoolSubject::all();
        return view('Backend.Setup.Assign_subject.create', compact('classes', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'class_id' => 'required',
                'subject_id' => 'required',
                'full_mark' => 'required',
                'pass_mark' => 'required',
                'subjective_mark' => 'required',
            ],
            // Custom message errors
            [
                'class_id.required' => 'Class name cannot be blank',
                'subject_id.required' => 'Subject cannot be blank',
            ]
        );
        $countSubject = count($request->subject_id);
        if ($countSubject != null) {

            for ($i = 0; $i < $countSubject; $i++) {

                $model = new AssignSubject();
                $model->class_id = $request->class_id;
                $model->subject_id = $request->subject_id[$i];
                $model->full_mark = $request->full_mark[$i];
                $model->pass_mark = $request->pass_mark[$i];
                $model->subjective_mark = $request->subjective_mark[$i];
                $model->save();
            }
        }

        $notification = array(
            'message' => 'Data Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('assign_subject.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        // Filter by class_id
        $data  = AssignSubject::where('class_id', $class_id)
            ->orderBy('subject_id', 'ASC')
            ->get();

        return view('Backend.Setup.Assign_subject.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($class_id)
    {
        // Filter by class_id
        $data  = AssignSubject::where('class_id', $class_id)
            ->orderBy('subject_id', 'ASC')
            ->get();
        $subjects = SchoolSubject::all();

        $classes = StudentClass::all();

        return view('Backend.Setup.Assign_subject.edit', compact('data', 'subjects', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id)
    {
        if ($request->subject_id == null) {
            $notification = array(
                'message' => 'Sorry, You did not select any subject',
                'alert-type' => 'error'
            );

            return redirect()->route('assign_subject.edit', $class_id)->with($notification);
        } else {

            $countSubjects = count($request->subject_id);

            // Delete selected
            AssignSubject::where('class_id', $class_id)->delete();

            //  Then re-upload afresh
            for ($i = 0; $i < $countSubjects; $i++) {

                $model = new AssignSubject();
                $model->class_id = $request->class_id;
                $model->subject_id = $request->subject_id[$i];
                $model->full_mark = $request->full_mark[$i];
                $model->pass_mark = $request->pass_mark[$i];
                $model->subjective_mark = $request->subjective_mark[$i];
                $model->save();
            }
        }
        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('assign_subject.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
