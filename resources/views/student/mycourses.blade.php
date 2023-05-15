@extends('layouts.appstudent')
@section('content')
<div id="content" class="span10">
    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header">
                <h2><i class="halflings-icon white white tasks"></i><span class="break"></span>Мои курсы</h2>
            </div>
            <div class="box-content">
                <ul class="skill-bar">
                    @foreach ($courses as $course)
                    <li>
                        <a href="/slider-details/{{$course->course->id}}">
                            <h5>{{$course->course->name}} ( {{$course->totalpoints}} )</h5>
                        </a>
                        <div class="meter green"><span style="width:<?=$course->totalpoints?>%"></span></div><!-- Edite width here -->
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
</div>
<!--/.fluid-container-->

@endsection