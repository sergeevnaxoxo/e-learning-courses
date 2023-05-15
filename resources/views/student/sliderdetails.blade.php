@extends('layouts.appstudent')
@section('content')
<!-- start: Content -->
<div id="content" class="span10">
    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header">
                <h2><i class="halflings-icon white white tasks"></i><span class="break"></span>{{$course->name}}</h2>
            </div>
            <div class="box-content">
                @foreach ($course->sliders()->get()->sortBy('number') as $slider)
                @if (!empty($slider->training_id))
                <div >
                    <h1>{{$slider->name}} <small>{{$slider->description}}</small></h1>
                </div>
                @if (!empty($slider->visits()->first()) and !empty($slider->visits()->where('user_id',Auth::user()->id)->whereNotNull('points')->first()))

                <div class="span12" >
                    <h3>Тренеровка | <strong class="green"><a class="icon-check" ></a>Выполненный</strong><span>| Получено балов: {{$slider->visits()->where('user_id',Auth::user()->id)->where('slider_id',$slider->id)->first()->points ?? null}}</span>

                    </h3>
                </div>
                <div class="page-header" style="padding-bottom: 50px;"></div>
                @else
                <div class="span12">
                    <h3>Тренеровка <strong class="red"><a class="icon-check-empty" ></a>Невыполненный</strong>

                        <div class="span2" style="float: right;">

                            <a href="/slider-training/{{$slider->training_id}}" class="glyphicons-icon book"></a>

                        </div>
                    </h3>
                </div>
                <div class="page-header" style="padding-bottom: 50px;"></div>
                @endif
                @elseif (!empty($slider->task_id))
                <div >
                    <h1>{{$slider->name}} <small>{{$slider->description}}</small></h1>
                </div>
                @if (!empty($slider->visits()->first()) and !empty($slider->visits()->where('user_id',Auth::user()->id)->whereNotNull('points')->first()))

                <div class="span12">
                    <h3>Тест | <strong class="green"><a class="icon-check" ></a>Выполненный</strong><span>| Получено балов: {{$slider->visits()->where('user_id',Auth::user()->id)->where('slider_id',$slider->id)->first()->points ?? null}}</span>

                    </h3>
                </div>
                <div class="page-header" style="padding-bottom: 50px;"></div>
                @else
                <div class="span12">
                    <h3>Тест <strong class="red"><a class="icon-check-empty" ></a>Невыполненный</strong>

                        <div class="span2" style="float: right;">
                            <a href="/test/{{$slider->id}}" class="glyphicons-icon notes_2"></a>
                        </div>
                    </h3>
                </div>
                <div class="page-header" style="padding-bottom: 50px;"></div>
                @endif
                @endif
                @endforeach
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
</div>
<!--/.fluid-container-->
@endsection
