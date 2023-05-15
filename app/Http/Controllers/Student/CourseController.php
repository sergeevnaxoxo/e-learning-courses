<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Request as ModelsRequest;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class CourseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function applyCourses(){
        $studentCourses = User::find(Auth::user()->id)->studentCourses()->get();
        $courses = Course::paginate(2);
        return view('student.applycourses',compact('studentCourses','courses'));
    }
    public function addStudentCourse(){
        $course_id = $_POST['course_id'];
        $student_id = Auth::user()->id;
        $status = 0;
        if(empty(ModelsRequest::where('course_id',$course_id)->where('student_id',$student_id)->first()))
        {
        ModelsRequest::create([
            'status'=>$status,
            'course_id'=>$course_id,
            'student_id'=>$student_id,
        ]);
        }
        else{
            return redirect(url()->previous());
        }
        return redirect(url()->previous());
    }
    public function myCourses(){
        $studentCourses = User::find(Auth::user()->id)->studentCourses()->get();
        $courses = User::find(Auth::user()->id)->studentCourses()->get();
        return view('student.mycourses',compact('studentCourses','courses'));

    }

}
