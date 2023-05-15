@extends('layouts.appstudent')
@section('content')
<!-- start: Content -->
<div id="content" class="span10">
    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header">
                <h2><i class="halflings-icon white white tasks"></i><span class="break"></span>{{$training->sliders()->first()->name}}</h2>
                
            </div>
            <div class="box-content">
                
                <div class="page-header">
                    <h1>{{$training->name}}
                <br/> <small>{{$training->description}}</small></h1>
                </div>
                <div class="span11">
                    <h3>Материал
                    <br/>
                    <hr/>
                    <small>
                    {{$training->text}}
                    <br/>
                    <hr />
                    </small>

                        <div class="span2" style="float: right;">
                            <a href="{{$training->linkmaterial}}" target="_blank">Доп. материал</a>
                        </div>
                        @if (!empty($training->description))
                        <a href="{{ url('/add-visit-training') }}" onclick="event.preventDefault();
                                                     document.getElementById('visit-training-form').submit();"><i class="halflings-icon off"></i> Завершить тренировку</a>
                                <form id="visit-training-form" action="{{url('/add-visit-training') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="training_id" value="{{$training->id}}">
                                </form>
                        @endif
                       
                    </h3>
                </div>
                
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
</div>
<!--/.fluid-container-->
@endsection