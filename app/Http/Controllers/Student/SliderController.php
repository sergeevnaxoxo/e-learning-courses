<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Request as ModelsRequest;
use App\Models\Slider;
use App\Models\StudentCourse;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Visit;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function detailSliders($id){
        $studentCourses = User::find(Auth::user()->id)->studentCourses()->get();
        $course = Course::where('id',$id)->first();
        return view('student.sliderdetails',compact('studentCourses','course'));
    }
    public  function detailTraining($id)
    {
        $studentCourses = User::find(Auth::user()->id)->studentCourses()->get();
        $training = Training::find($id);
        return view('student.trainingdetails',compact('studentCourses','training'));
    }
    public function addVisitTraining(){
        $training_id = $_POST['training_id'];
        $training = Training::find($training_id);
        $slider = Slider::where('training_id',$training->id)->first();
        $points = $training->points ?? null;
        $user_id = Auth::user()->id;
        $slider_id = $slider->id ?? null;
        $course = Course::find($slider->course->id) ?? null;
        $studentCourse = StudentCourse::where('student_id',Auth::user()->id)->where('course_id',$course->id)->first() ?? null;
        $newtotalpoints = $points + $studentCourse->totalpoints;
        if(!empty($studentCourse->id))
        {
            Visit::create([
                'points'=>$points,
                'user_id'=>$user_id,
                'slider_id'=>$slider_id,

            ]);
            StudentCourse::where('id',$studentCourse->id)->update([
                'totalpoints'=>$newtotalpoints,

            ]);
            return redirect('/my-courses');
        }
        else{
            return 'studentCourse is null';
        }

    }
}
