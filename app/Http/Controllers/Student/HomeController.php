<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Slider;
use App\Models\StudentCourse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Visit;
use PhpParser\Node\Expr\Match_;

class HomeController extends Controller
{
    /*
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function sectionDropdown()
    {
        $courses = User::find(Auth::user()->id)->courses()->get();
        return view('student.dropdownmycourse', compact('courses'));
    }
    public function index()
    {
        $studentCourses = User::find(Auth::user()->id)->studentCourses()->get();
        return view('student.home', compact('studentCourses'));
    }
    public function testShow($id)
    {
        $studentCourses = User::find(Auth::user()->id)->studentCourses()->get();
        $slider = Slider::where('id', $id)->first();
        return view('student.test', compact('studentCourses', 'slider'));
    }
    public function testAcive()
    {
        $totalpoints = 0;
        $slider_id = $_POST['slider_id'];
        $slider = Slider::find($slider_id);
        $user_id = Auth::user()->id;
        $course = Course::find($slider->course->id);
        $studentС = StudentCourse::where('student_id', $user_id)->where('course_id', $course->id)->first();
        $oldpointCourse = $studentС->totalpoints;

        foreach ($slider->task->questions()->get() as $question) {
            if ($question->type->name == "Вопрос с одним ответом") {

                if (isset($_POST[$question->id])) {
                    $answer = $_POST[$question->id];
                    $rigtanswer =  $question->rightQuestions()->first()->variant_id;
                    if ($answer == $rigtanswer) {
                        $totalpoints = $totalpoints + $question->points;
                    }
                }
            }
            if ($question->type->name == "Вопрос с многими ответами") {
                if (isset($_POST[$question->id])) {
                    $answers = $_POST[$question->id];
                    $rigtanswers = $question->rightQuestions();
                    foreach ($rigtanswers->get() as $rigthanswer) {
                        if (in_array($rigthanswer->variant_id, $answers)) {
                            $totalpoints = $totalpoints + round(($question->points / $rigtanswers->count()), 2);
                        }
                    }
                }
                if ($question->type->name == "Соответствие между вопросами и ответами") {

                    $answers = $_POST[$question->id . 'name'];
                    $rigtanswers = $question->variants()->get();

                    foreach ($rigtanswers as $key => $rigthanswer) {
                        if ($rigthanswer->name == $answers[$key]) {
                            $totalpoints = $totalpoints + round(($question->points / $rigtanswers->count()), 2);
                        }
                    }
                }
                if ($question->type->name == "Последовательность ответов") {
                    $answers = $_POST[$question->id . 'name'];
                    $numbers = $_POST[$question->id . 'number'];
                    $rigtanswers = $question->rightQuestions()->get();

                    foreach ($rigtanswers as $key => $rigthanswer) {
                        $i = 0;
                        while ($i < count($answers)) {
                            if ($rigthanswer->variant->name == $answers[$i] and $rigthanswer->number == $numbers[$i]) {
                                $totalpoints = $totalpoints + round(($question->points / $rigtanswers->count()), 2);
                            }
                            $i++;
                        }
                    }
                }
                if ($question->type->name == "Вопрос с изображением") {
                    if (isset($_POST[$question->id])) {
                        $answer = $_POST[$question->id];
                        $rigtanswer =  $question->rightQuestions()->first()->variant->name;
                        if ($answer == $rigtanswer) {
                            $totalpoints = $totalpoints + $question->points;
                        }
                    }
                }
                if ($question->type->name == "Вопрос с видео") {
                    if (isset($_POST[$question->id])) {
                        $answer = $_POST[$question->id];
                        $rigtanswer =  $question->rightQuestions()->first()->variant->name;
                        if ($answer == $rigtanswer) {
                            $totalpoints = $totalpoints + $question->points;
                        }
                    }
                }
                if ($question->type->name == "Вопрос с ответом в виде изображения") {
                    if (isset($_POST[$question->id])) {
                        $answer = $_POST[$question->id];
                        $rigtanswer =  $question->rightQuestions()->first()->variant_id;
                        if ($answer == $rigtanswer) {
                            $totalpoints = $totalpoints + $question->points;
                        }
                    }
                }
                if ($question->type->name == "Вопрос с вводом пропущенных слов") {
                    if (isset($_POST[$question->id])) {
                        $answers = $_POST[$question->id];
                        $rigtanswers = $question->rightQuestions();
                        foreach ($rigtanswers->get() as $key => $rigthanswer) {
                            if ($rigthanswer->variant->name == $answers[$key]) {
                                $totalpoints = $totalpoints + round(($question->points / $rigtanswers->count()), 2);
                            }
                        }
                    }
                }
                if ($question->type->name == "Вопрос с выбором пропущенного слова") {


                    if (isset($_POST[$question->id])) {
                        $answer = $_POST[$question->id];
                        $rigtanswer =  $question->rightQuestions()->first()->variant_id;
                        if ($answer == $rigtanswer) {
                            $totalpoints = $totalpoints + $question->points;
                        }
                    }
                }
            }
        }
        Visit::create([
            'points' => $totalpoints,
            'user_id' => $user_id,
            'slider_id' => $slider_id,

        ]);
        StudentCourse::where('id', $studentС->id)->update([
            'totalpoints' => $oldpointCourse + $totalpoints,

        ]);
        return redirect('/slider-details/' . $course->id);
    }
    public function showEditProfile()
    {
        $studentCourses = User::find(Auth::user()->id)->studentCourses()->get();
        $user = User::find(Auth::user()->id);
        return view('student.editprofile', compact('user', 'studentCourses'));
    }
    public function updateProfile()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        if (isset($_POST['id'])) {
            User::find($id)->update([
                'name' => $name,
                'email' => $email,

            ]);
            return redirect(url()->previous());
        }
        return redirect(url()->previous());
    }
}
