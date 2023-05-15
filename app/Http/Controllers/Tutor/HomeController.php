<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Question;
use App\Models\Request as ModelsRequest;
use App\Models\RightQuestion;
use App\Models\Slider;
use App\Models\StudentCourse;
use App\Models\Task;
use App\Models\Training;
use App\Models\Type;
use App\Models\User;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tutorCourses = Course::where('tutor_id', Auth::user()->id)->get();

        return view('tutor.home', compact('tutorCourses'));
    }
    public function chengeReguest()
    {
        $tutorCourses = Course::where('tutor_id', Auth::user()->id)->get();
        return view('tutor.changerequest', compact('tutorCourses'));
    }
    public function addStudentCourse()
    {
        $requestr_id = $_POST['request_id'];
        $request = ModelsRequest::where('id', $requestr_id)->first();
        $course_id = $request->course_id;
        $student_id = $request->student_id;
        StudentCourse::create([
            'totalpoints' => 0,
            'course_id' => $course_id,
            'student_id' => $student_id,

        ]);
        ModelsRequest::where('id', $requestr_id)->first()->update([
            'status' => 1,

        ]);
        return redirect(url()->previous());
    }
    public function deleteStudentCourse()
    {
        $requestr_id = $_POST['request_id'];
        ModelsRequest::where('id', $requestr_id)->first()->update([
            'status' => 1,

        ]);
        return redirect(url()->previous());
    }
    public function myCourses()
    {
        $courses = Course::where('tutor_id', Auth::user()->id)->paginate(2);
        return view('tutor.mycourses', compact('courses'));
    }
    public function openEditCourse($id)
    {
        $course = Course::where('id', $id)->first();
        return view('tutor.openeditcourse', compact('course'));
    }
    public function updateCourse()
    {
        $name = $_POST['nameCourse'];
        $description = $_POST['descriptionCourse'];
        $maxpoint = $_POST['maxpoinCourse'];
        $id = $_POST['id'];
        if (isset($_POST['id'])) {
            Course::where('id', $id)->first()->update([
                'name' => $name,
                'description' => $description,
                'maxpoint' => $maxpoint,
            ]);

            return redirect(url()->previous());
        } else
            return redirect(url()->previous());
    }
    public function updateSlider()
    {
        $id = $_POST['slider_id'];
        $name = $_POST['nameSlider'];
        $number = $_POST['numberSlider'];
        $descrition = $_POST['descritionSlider'];
        $maxpoints = $_POST['maxpointsSlider'];
        $minpoints = $_POST['minpointsSlider'];
        if (!empty($id)) {
            Slider::where('id', $id)->first()->update([
                'name' => $name,
                'number' => $number,
                'descrition' => $descrition,
                'maxpoints' => $maxpoints,
                'minpoints' => $minpoints,
            ]);
            return redirect(url()->previous());
        } else
            return redirect(url()->previous());
    }
    public function openAddCourse()
    {

        return view('tutor.openaddcourse');
    }
    public function addCourse()
    {
        $name = $_POST['nameCourse'];
        $description = $_POST['descriptionCourse'];
        $maxpoint = $_POST['maxpoinCourse'];
        Course::create([
            'name' => $name,
            'description' => $description,
            'maxpoint' => $maxpoint,
            'tutor_id' => Auth::user()->id,
            'status_id' => 1,
        ]);
        return redirect('/my-courses-tutor');
    }
    public function addSlider()
    {
        $name = $_POST['nameSlider'];
        $number = $_POST['numberSlider'];
        $descrition = $_POST['descritionSlider'];
        $maxpoints = $_POST['maxpointsSlider'];
        $minpoints = $_POST['minpointsSlider'];
        $course_id = $_POST['course_id'];
        Slider::create([
            'name' => $name ?? null,
            'number' => $number ?? null,
            'descrition' => $descrition ?? null,
            'maxpoints' => $maxpoints ?? null,
            'minpoints' => $minpoints ?? null,
            'course_id' => $course_id ?? null,
        ]);
        return redirect(url()->previous());
    }
    public function openAddSlider($id)
    {
        $slider = Slider::where('id', $id)->first();
        $types = Type::get();
        return view('tutor.openaddslider', compact('slider', 'types'));
    }
    public function addTraining()
    {
        $name = $_POST['name'];
        $descrition = $_POST['descrition'];
        $text = $_POST['text'];
        $linkmaterial = $_POST['linkmaterial'];
        $points = $_POST['points'];
        $slider_id = $_POST['slider_id'];
        $training = Training::create([
            'name' => $name,
            'description' => $descrition,
            'text' => $text,
            'linkmaterial' => $linkmaterial,
            'points' => $points ?? null,
            'slider_id' => $slider_id,

        ]);
        Slider::where('id', $slider_id)->first()->update([
            'training_id' => $training->id,

        ]);
        return redirect(url()->previous());
    }
    public function addTask()
    {
        $name = $_POST['nameTest'];
        $slider_id = $_POST['slider_id'];
        $task = Task::create([
            'name' => $name,

        ]);
        Slider::where('id', $slider_id)->first()->update([
            'task_id' => $task->id,
        ]);
        return redirect(url()->previous());
    }
    public function generationQuestion()
    {
        $task_id = $_GET['task_id'];
        $type_name = $_GET['type_name'];
        if ($type_name == "Вопрос с одним ответом") {
            return redirect('/oneanswear/' . $task_id);
        } elseif ($type_name == "Вопрос с многими ответами") {
            return redirect('/manyanswears/' . $task_id);
        } elseif ($type_name == "Соответствие между вопросами и ответами") {
            return redirect('/conformity/' . $task_id);
        } elseif ($type_name == "Последовательность ответов") {
            return redirect('/sequence/' . $task_id);
        } elseif ($type_name == "Вопрос с изображением") {
            return redirect('/withimage/' . $task_id);
        } elseif ($type_name == "Вопрос с видео") {
            return redirect('/withvideo/' . $task_id);
        } elseif ($type_name == "Вопрос с ответом в виде изображения") {
            return redirect('/imageanswear/' . $task_id);
        } elseif ($type_name == "Вопрос с вводом пропущенных слов") {
            return redirect('/emptywords/' . $task_id);
        } elseif ($type_name == "Вопрос с выбором пропущенного слова") {
            return redirect('/selectword/' . $task_id);
        } else {
            return redirect(url()->previous());
        }
    }
    public function oneanswearAdd()
    {
        $indexrightanswer = $_POST['dzen'];
        $answers = $_POST['answears'];
        $comment = $_POST['comment'];
        $task_id = $_POST['task_id'];
        $slider_id = Slider::where('task_id', $task_id)->first()->id;
        $question = Question::Create([
            'name' => $comment,
            'points' => 1,
            'task_id' => $task_id,
            'type_id' => 1,

        ]);
        $i = 0;
        while ($i < count($answers)) {
            $variant = Variant::create([
                'name' => $answers[$i],
                'question_id' => $question->id,

            ]);
            if ($indexrightanswer == $i)
                RightQuestion::create([
                    'variant_id' => $variant->id,
                    'question_id' => $question->id,

                ]);
            $i++;
        }
        return redirect(url('/open-add-slider/' . $slider_id));
    }
    public function manyanswearsAdd()
    {
        $task_id = $_POST['task_id'];
        $slider_id = Slider::where('task_id', $task_id)->first()->id;
        $comment = $_POST['comment'];
        $indexrightanswers = $_POST['dzen'];
        $answers = $_POST['answears'];
        $question = Question::Create([
            'name' => $comment,
            'points' => 1,
            'task_id' => $task_id,
            'type_id' => 2,

        ]);
        $i = 0;
        while ($i < count($answers)) {
            $variant = Variant::create([
                'name' => $answers[$i],
                'question_id' => $question->id,

            ]);
            $j = 0;
            while ($j < count($indexrightanswers)) {
                if ($indexrightanswers[$j] == $i)
                    RightQuestion::create([
                        'variant_id' => $variant->id,
                        'question_id' => $question->id,

                    ]);
                $j++;
            }

            $i++;
        }
        return redirect(url('/open-add-slider/' . $slider_id));
    }
    public function conformityAdd()
    {
        $task_id = $_POST['task_id'];
        $slider_id = Slider::where('task_id', $task_id)->first()->id;
        $comment = $_POST['comment'];
        $answers = $_POST['answears'];
        $questions = $_POST['qusetions'];
        $question = Question::Create([
            'name' => $comment,
            'points' => 1,
            'task_id' => $task_id,
            'type_id' => 3,

        ]);
        $i = 0;
        while ($i < count($answers)) {
            $variant = Variant::create([
                'name' => $answers[$i],
                'question_id' => $question->id,
                'description' => $questions[$i],

            ]);

            $i++;
        }
        return redirect(url('/open-add-slider/' . $slider_id));
    }
    public function sequenceAdd()
    {
        $task_id = $_POST['task_id'];
        $slider_id = Slider::where('task_id', $task_id)->first()->id;
        $comment = $_POST['comment'];
        $answers = $_POST['answears'];
        $question = Question::Create([
            'name' => $comment,
            'points' => 1,
            'task_id' => $task_id,
            'type_id' => 4,

        ]);
        $i = 0;
        while ($i < count($answers)) {
            $variant = Variant::create([
                'name' => $answers[$i],
                'question_id' => $question->id,

            ]);


            RightQuestion::create([
                'variant_id' => $variant->id,
                'question_id' => $question->id,
                'number' => $i,

            ]);

            $i++;
        }
        return redirect(url('/open-add-slider/' . $slider_id));
    }
    public function withimageAdd()
    {
        $task_id = $_POST['task_id'];
        $slider_id = Slider::where('task_id', $task_id)->first()->id;
        $comment = $_POST['comment'];
        $answers = $_POST['answeqr'];


        if (isset($_FILES["image"])) {

            $uploaddir = public_path() . '/img';
            $namefile = time() . rand(0, 1000000) . '_' . basename($_FILES['image']['name']);
            $uploadfile = $uploaddir . '/' . $namefile;
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
            $imgstring = '/img/' . $namefile;
            $question = Question::Create([
                'name' => $comment,
                'points' => 1,
                'task_id' => $task_id,
                'type_id' => 5,
                'img' => $imgstring,

            ]);

            $variant = Variant::create([
                'name' => $answers,
                'question_id' => $question->id,

            ]);

            RightQuestion::create([
                'variant_id' => $variant->id,
                'question_id' => $question->id,

            ]);
        }
        return redirect(url('/open-add-slider/' . $slider_id));
    }
    public function withvideoAdd()
    {
        $task_id = $_POST['task_id'];
        $slider_id = Slider::where('task_id', $task_id)->first()->id;
        $comment = $_POST['comment'];
        $answers = $_POST['answeqr'];


        if (isset($_FILES["video"])) {

            $uploaddir = public_path() . '/file';
            $namefile = time() . rand(0, 1000000) . '_' . basename($_FILES['video']['name']);
            $uploadfile = $uploaddir . '/' . $namefile;
            move_uploaded_file($_FILES['video']['tmp_name'], $uploadfile);
            $imgstring = '/file/' . $namefile;
            $question = Question::Create([
                'name' => $comment,
                'points' => 1,
                'task_id' => $task_id,
                'type_id' => 6,
                'file' => $imgstring,

            ]);

            $variant = Variant::create([
                'name' => $answers,
                'question_id' => $question->id,

            ]);

            RightQuestion::create([
                'variant_id' => $variant->id,
                'question_id' => $question->id,

            ]);
        }
        return redirect(url('/open-add-slider/' . $slider_id));
    }
    public function imageanswearAdd()
    {
        $indexrightanswer = $_POST['dzen'];
        $comment = $_POST['comment'];
        $task_id = $_POST['task_id'];
        $slider_id = Slider::where('task_id', $task_id)->first()->id;
        $file = $_FILES['image'];
        $question = Question::Create([
            'name' => $comment,
            'points' => 1,
            'task_id' => $task_id,
            'type_id' => 7,

        ]);
        foreach ($file['name'] as $key => $name) {
            $files = $_FILES['image'];

            if ($files['error'][$key] == 0) {

                $uploaddir = public_path() . '/img';
                $namefile = time() . rand(0, 1000000) . '_' . $name;
                $uploadfile = $uploaddir . '/' . $namefile;
                move_uploaded_file($files['tmp_name'][$key], $uploadfile);
                $imgstring = '/img/' . $namefile;
                $variant = Variant::create([
                    'question_id' => $question->id,
                    'img' => $imgstring,
                ]);
            }
            if ($indexrightanswer == $key)
            RightQuestion::create([
                'variant_id' => $variant->id,
                'question_id' => $question->id,

            ]);

        }
        return redirect(url('/open-add-slider/' . $slider_id));
    }
    public function emptywordsAdd()
    {

        $answers = $_POST['answears'];
        $comment = $_POST['comment'];
        $task_id = $_POST['task_id'];
        $slider_id = Slider::where('task_id', $task_id)->first()->id;
        $question = Question::Create([
            'name' => $comment,
            'points' => 1,
            'task_id' => $task_id,
            'type_id' => 8,

        ]);
        $i = 0;
        while ($i < count($answers)) {
            $variant = Variant::create([
                'name' => $answers[$i],
                'question_id' => $question->id,

            ]);
            RightQuestion::create([
                'variant_id' => $variant->id,
                'question_id' => $question->id,
                'number'=>$i,

            ]);
           $i++;
        }
        return redirect(url('/open-add-slider/' . $slider_id));
    }
    public function selectwordAdd()
    {
        $indexrightanswer = $_POST['dzen'];
        $answers = $_POST['answers'];
        $comment = $_POST['comment'];
        $task_id = $_POST['task_id'];
        $slider_id = Slider::where('task_id', $task_id)->first()->id;
        $question = Question::Create([
            'name' => $comment,
            'points' => 1,
            'task_id' => $task_id,
            'type_id' => 9,

        ]);
        $i = 0;
        while ($i < count($answers)) {
            $variant = Variant::create([
                'name' => $answers[$i],
                'question_id' => $question->id,

            ]);
            if ($indexrightanswer == $i)
                RightQuestion::create([
                    'variant_id' => $variant->id,
                    'question_id' => $question->id,

                ]);
            $i++;
        }
        return redirect(url('/open-add-slider/' . $slider_id));
    }
    public function deleteQuestion(){

        if(isset($_POST['id'])){
            $question_id = $_POST['id'];
            Question::where('id',$question_id)->delete();
            return redirect(url()->previous());
        }
        return redirect(url()->previous());
    }
    public function deleteTraining(){
        if(isset($_POST['id'])){
            $training_id = $_POST['id'];
            Slider::where('training_id',$training_id)->update([
                'training_id'=>null,
            ]);
            Training::where('id',$training_id)->delete();
            return redirect(url()->previous());
        }
        return redirect(url()->previous());
    }
    public function showEditProfile(){
        $user = User::find(Auth::user()->id);
        return view('tutor.editprofile',compact('user'));
    }
    public function updateProfile(){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        if(isset($_POST['id']))
        {
            User::find($id)->update([
                'name'=>$name,
                'email'=>$email,

            ]);
            return redirect(url()->previous());
        }
        return redirect(url()->previous());
    }
}
