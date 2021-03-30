<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\lecture_student;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'student_name' => 'required|string',
            'student_reg_no' => 'required|string|unique:students',
            'student_password' => 'required|string'
        ]);
        $student = new Student;
        $student->student_name = $request->student_name;
        $student->student_reg_no     = $request->student_reg_no;
        $student->student_password = $request->student_password;
        //$student->password = $request->has('password') ? Hash::make($request->password) : Hash::make('123');

        $student->save();

        session()->flash('success', 'student created successfully');

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }


    public function assign($id)
    {
        $student = Student::find($id);
        $courses = Lecture::get();
        return view('admin.assign_lecture', compact('student', 'courses'));
    }
    public function register_to_lecture(Request $request, $id)
    {
        $request->validate([
            'course' => 'required'
        ]);
        $sl = new lecture_student;
        $sl->student_id = $id;
        $sl->lecture_id = $request->course;
        $sl->save();

        session()->flash('success', 'Lecture assigned successfully');
        return redirect('/admin');
    }
}
