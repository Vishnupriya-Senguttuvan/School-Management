<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\model\User;
use App\Models\Student;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function student_create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function student_store(Request $request)
    {
        // $request->validate([
        // 'name' => 'required|string|max:255',
        // 'email' => 'required|email|unique:student,email',
        // 'dob' => 'required|date|before:today',
        // 'mobile' => 'required|digits:10|unique:student,mobile',
        // 'img'=>['required','img','mimes:jpeg,png,jpg,gif,svg','max:1000'],
        // ],
        // [
        //     'name.required' => 'The name field is required.',
        //     'email.unique' => 'This email is already registered.',
        //     'dob.before' => 'The date of birth must be a past date.',
        //     'mobile.digits' => 'The mobile number must be exactly 10 digits.',
        //     'img'=>'Image field is required.'
        // ]);
        
        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->dob = $request->dob;
        $student->mobile = $request->mobile;
        if ($request->hasFile('student_image')) {
            $filePath = $request->file('student_image')->store('student_images', 'public');
            $student->student_image = $filePath; // Save the file path in the database
        }
        $student->save();
        return redirect()->route('student.index')->with('success', 'Student added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function student_show($id){
        $student = Student::findOrFail($id);
        // dd($student); 
        return view('students.show', compact('student'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function student_edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function student_update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:student,email,' . $id,
        //     'dob' => 'required|date|before:today',
        //     'mobile' => 'required|digits:10|unique:student,mobile,' . $id,
        //     'img'=>['required','img','mimes:jpeg,png,jpg,gif,svg','max:1000'],
        // ],[
        //     'name.required' => 'The name field is required.',
        //     'email.unique' => 'This email is already registered.',
        //     'dob.before' => 'The date of birth must be a past date.',
        //     'mobile.digits' => 'The mobile number must be exactly 10 digits.',
        //     'img'=>'Image field is required.'
        // ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function student_destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}
