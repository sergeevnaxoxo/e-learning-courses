@extends('layouts.apptutor')
@section('content')

<!-- start: Content -->
<div id="content" class="span10">

    <div class="row-fluid">

        <div class="box black span12 noMargin" onTablet="span12" onDesktop="span12">
            <div class="box-header">
                <h2><i class="halflings-icon white check"></i><span class="break"></span>Мои курсы </h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">
                <div class="todo metro">
                    <ul class="todo-list">
                        @foreach ($tutorCourses as $tutorCourse)
                        <li class="white" style="color: black !important;">
                            <a href="/open-edit-course/{{$tutorCourse->id}}" style="color: black !important;"><b>Курс:{{$tutorCourse->name}}</b> | Описание: {{Str::substr($tutorCourse->description,0,120)}}...</a>
                            <strong>Количество студентов на курсе: {{$tutorCourse->studentCourses()->count()}}</strong>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>
<!--/.fluid-container-->
@endsection