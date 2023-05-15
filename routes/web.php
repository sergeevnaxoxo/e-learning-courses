<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Student\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\View;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//Routes student....
Route::get('/home-student', [App\Http\Controllers\Student\HomeController::class,'index']);
Route::get('/apply-courses', [App\Http\Controllers\Student\CourseController::class,'applyCourses']);
Route::post('/add-student-course',[App\Http\Controllers\Student\CourseController::class,'addStudentCourse']);
Route::get('/my-courses', [App\Http\Controllers\Student\CourseController::class,'myCourses']);
Route::get('/slider-details/{id}', [App\Http\Controllers\Student\SliderController::class,'detailSliders']);
Route::get('/slider-training/{id}', [App\Http\Controllers\Student\SliderController::class,'detailTraining']);
Route::post('/add-visit-training',[App\Http\Controllers\Student\SliderController::class,'addVisitTraining']);
Route::get('/edit-profile-student',[App\Http\Controllers\Student\HomeController::class,'showEditProfile']);
Route::post('/edit-profile-student',[App\Http\Controllers\Student\HomeController::class,'updateProfile']);




//Routes tutor....
Route::get('/home-tutor', [App\Http\Controllers\Tutor\HomeController::class,'index']);
Route::get('/chenge-request',[App\Http\Controllers\Tutor\HomeController::class,'chengeReguest']);
Route::post('/active-request',[App\Http\Controllers\Tutor\HomeController::class,'addStudentCourse']);
Route::post('/inactive-request',[App\Http\Controllers\Tutor\HomeController::class,'deleteStudentCourse']);
Route::get('/my-courses-tutor',[App\Http\Controllers\Tutor\HomeController::class,'myCourses']);
Route::get('/open-edit-course/{id}',[App\Http\Controllers\Tutor\HomeController::class,'openEditCourse']);
Route::post('/update-course',[App\Http\Controllers\Tutor\HomeController::class,'updateCourse']);
Route::post('/update-slider',[App\Http\Controllers\Tutor\HomeController::class,'updateSlider']);
Route::get('/open-add-course',[App\Http\Controllers\Tutor\HomeController::class,'openAddCourse']);
Route::post('/add-course',[App\Http\Controllers\Tutor\HomeController::class,'addCourse']);
Route::post('/add-slider',[App\Http\Controllers\Tutor\HomeController::class,'addSlider']);
Route::get('/open-add-slider/{id}',[App\Http\Controllers\Tutor\HomeController::class,'openAddSlider']);
Route::post('/add-training',[App\Http\Controllers\Tutor\HomeController::class,'addTraining']);
Route::post('/add-task',[App\Http\Controllers\Tutor\HomeController::class,'addTask']);
Route::get('/generate-add-question',[App\Http\Controllers\Tutor\HomeController::class,'generationQuestion']);
Route::get('/test/{id}',[App\Http\Controllers\Student\HomeController::class,'testShow']);
Route::post('/test',[App\Http\Controllers\Student\HomeController::class,'testAcive']);
Route::post('/inactive-question',[App\Http\Controllers\Tutor\HomeController::class,'deleteQuestion']);
Route::post('/inactive-training',[App\Http\Controllers\Tutor\HomeController::class,'deleteTraining']);
Route::get('/edit-profile',[App\Http\Controllers\Tutor\HomeController::class,'showEditProfile']);
Route::post('/edit-profile',[App\Http\Controllers\Tutor\HomeController::class,'updateProfile']);

//1.Вопрос с одним ответом
Route::get('/oneanswear/{task_id}', function ($task_id) {
    return view('tutor.oneanswear',compact('task_id'));
});
Route::post('/oneanswear',[App\Http\Controllers\Tutor\HomeController::class,'oneanswearAdd']);


//2.Вопрос с многими ответами
Route::get('/manyanswears/{task_id}', function ($task_id) {
    return view('tutor.manyanswears',compact('task_id'));
});
Route::post('/manyanswears',[App\Http\Controllers\Tutor\HomeController::class,'manyanswearsAdd']);



//3.Соответсви между вопросами и ответами
Route::get('/conformity/{task_id}', function ($task_id) {
    return view('tutor.conformity',compact('task_id'));
});
Route::post('/conformity',[App\Http\Controllers\Tutor\HomeController::class,'conformityAdd']);



//4.Последовательность ответов
Route::get('/sequence/{task_id}', function ($task_id) {
    return view('tutor.sequence',compact('task_id'));
});
Route::post('/sequence',[App\Http\Controllers\Tutor\HomeController::class,'sequenceAdd']);




//5.Вопрос с изображением
Route::get('/withimage/{task_id}', function ($task_id) {
    return view('tutor.withimage',compact('task_id'));
});
Route::post('/withimage',[App\Http\Controllers\Tutor\HomeController::class,'withimageAdd']);



//6.Вопрос с видео
Route::get('/withvideo/{task_id}', function ($task_id) {
    return view('tutor.withvideo',compact('task_id'));
});
Route::post('/withvideo',[App\Http\Controllers\Tutor\HomeController::class,'withvideoAdd']);



//7.Вопрос с ответом в виде изображения
Route::get('/imageanswear/{task_id}', function ($task_id) {

    return view('tutor.imageanswear',compact('task_id'));
});
Route::post('/imageanswear',[App\Http\Controllers\Tutor\HomeController::class,'imageanswearAdd']);



//8.Вопрос с вводом пропущенноых слов
Route::get('/emptywords/{task_id}', function ($task_id) {
    return view('tutor.emptywords',compact('task_id'));
});
Route::post('/emptywords',[App\Http\Controllers\Tutor\HomeController::class,'emptywordsAdd']);



//9.Вопрос с выбором пропущенного слова
Route::get('/selectword/{task_id}', function ($task_id) {
    return view('tutor.selectword',compact('task_id'));
});
Route::post('/selectword',[App\Http\Controllers\Tutor\HomeController::class,'selectwordAdd']);



Route::get('/home-admin',[App\Http\Controllers\Admin\HomeController::class,'index']);
Route::post('/add-user',[App\Http\Controllers\Admin\HomeController::class,'addUser']);
Route::get('/edit-profile-admin',[App\Http\Controllers\Admin\HomeController::class,'showEditProfile']);
Route::post('/edit-profile-admin',[App\Http\Controllers\Admin\HomeController::class,'updateProfile']);
//Route::post('/add-user',[App\Http\Controllers\Admin\HomeController::class,'addUser']);
//Route::post('/add-role/{id}',[App\Http\Controllers\Admin\HomeController::class,'addRole']);
