@extends('layouts.appstudent')
@section('content')

<!-- start: Content -->
<div id="content" class="span10">
    @if(!empty($studentCourses))
    @foreach ($studentCourses as $studenCourse)
    <div class="row-fluid">

        <div class="box black span12 noMargin" onTablet="span12" onDesktop="span12">
            <div class="box-header">
                <h2><i class="halflings-icon white check"></i><span class="break"></span>{{$studenCourse->course->name}} </h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">
                <div class="todo metro">
                    <ul class="todo-list" disabled>
                        @foreach ($studenCourse->course->sliders()->get() as $slider)

                        @if (!empty($slider->visits()->where('user_id', Auth::user()->id)->first()) and !empty($slider->visits()->first()->points))
                        <li class="green" style="text-decoration: line-through;">
                            <a class="icon-check" href="/slider-details/{{$studenCourse->course->id}}"></a>
                            {{$slider->name}}
                            <strong>Выполненный</strong>
                        </li>
                        @else
                        <li class="red">
                            <a class="icon-check-empty" href="/slider-details/{{$studenCourse->course->id}}"></a>
                            {{$slider->name}}
                            <strong>Невыполненный</strong>
                        </li>
                        @endif
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>

    </div>
    @endforeach
    @endif


</div>
<!--/.fluid-container-->
@endsection
