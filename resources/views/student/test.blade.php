@extends('layouts.appstudent')
@section('content')
<!-- start: Content -->
<div id="content" class="span10">
    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header">
                <h2><i class="halflings-icon white white tasks"></i><span class="break"></span>Прохождение теста</h2>

            </div>
            <div class="box-content">

                <div class="page-header">
                    <h1>{{$slider->task->name}}
                        <br /> <small></small>
                    </h1>
                </div>
                <div class="span11">

                    <form method="post" action="{{ url('/test') }}">
                        @csrf
                        @foreach($slider->task->questions()->get() as $key=>$question)
                        <fieldset>
                            <legend>Вопрос {{$key+1}}</legend>
                            <h1 align="center">{{$question->name}}</h1>
                            @if($question->type->name =="Вопрос с одним ответом")

                            <p align="center"><b>Задание: Вопрос с одним ответом.</b></p>

                            <div class="control-group" align="center">
                                <div class="controls">
                                    @foreach ($question->variants()->get() as $keyv=>$variant)
                                    <label class="radio">
                                        <input type="radio" name="{{$question->id}}" id="optionsRadios1" value="{{$variant->id}}" checked="">
                                        {{$variant->name}}
                                    </label>
                                    <div style="clear:both"></div>
                                    @endforeach
                                </div>
                            </div>

                            @endif
                            @if($question->type->name =="Вопрос с многими ответами")

                            <p align="center"><b>Задание: Вопрос с многими ответами.</b></p>
                            <table align="center" class="th1">
                                @foreach ($question->variants()->get() as $keyv=>$variant)
                                <tr>
                                    <td><input name="{{$question->id}}[]" type="checkbox" value="{{$variant->id}}"></td>
                                    <td>
                                        <p align="left">{{$variant->name}}</p>
                                    </td>
                                </tr>

                                @endforeach

                            </table>

                            @endif
                            @if($question->type->name =="Соответствие между вопросами и ответами")

                            <p align="center"><b>Задание: Соответствие между вопросами и ответами.</b></p>
                            <table align="center">
                                @foreach ($question->variants()->get() as $keyv=>$variant )
                                <tr>
                                    <td><input type="text" value="{{$variant->description}}" name="{{$question->id}}description[]" disabled="disabled"></td>
                                    <td> <select name="{{$question->id}}name[]">
                                            @foreach ($question->variants()->get()->shuffle() as $keyv1=>$variant1)
                                            <option value="{{$variant1->name}}">
                                                {{$variant1->name}}
                                            </option>
                                            @endforeach


                                        </select></td>
                                </tr>
                                @endforeach

                            </table>

                            @endif
                            @if($question->type->name =="Последовательность ответов")

                            <p align="center"><b>Задание: Последовательность ответов.</b></p>
                            <table align="center">
                                @foreach ($question->variants()->get()->shuffle() as $keyv=>$variant )
                                <tr>
                                    <td><input type="text" value="{{$variant->name}}" name="{{$question->id}}name[]" readonly></td>
                                    <td> <select name="{{$question->id}}number[]">
                                            @foreach ($question->variants()->get() as $keyv1=>$variant1 )
                                            <option value="{{$keyv1}}">
                                                {{$keyv1+1}}
                                            </option>
                                            @endforeach

                                        </select></td>
                                </tr>
                                @endforeach
                            </table>

                            @endif
                            @if($question->type->name =="Вопрос с изображением")

                            <p align="center"><b>Задание: Вопрос с изображением.</b></p>
                            <img src="{{$question->img}}" height="500px" align="center">
                            <table align="center" class="th1">

                                <tr>
                                    <td><input name="{{$question->id}}" type="text" placeholder="Ваш ответ"></td>
                                </tr>
                            </table>

                            @endif
                            @if($question->type->name =="Вопрос с видео")

                            <p align="center"><b>Задание: Вопрос с видео.</b></p>
                            <p align="center">
                            <video height="50%" width="50%" controls="controls" align="center">
                                <source src="{{$question->file}}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                                Тег video не поддерживается вашим браузером.
                                <a href="{{$question->file}}">Скачайте видео</a>.
                            </video>
                            </p>
                            <table align="center" class="th1">
                                <tr>
                                    <td><input name="{{$question->id}}" type="text" placeholder="Ваш ответ"></td>
                                </tr>
                            </table>

                            @endif
                            @if($question->type->name =="Вопрос с ответом в виде изображения")

                            <p align="center"><b>Задание: Вопрос с ответом в виде изображения.</b></p>

                            <div class="control-group" align="center">
                                <div class="controls">
                                    @foreach ($question->variants()->get() as $keyv=>$variant)
                                    <label class="radio">
                                        <p align="center" style="margin-left: 850px;"><input type="radio" name="{{$question->id}}" id="optionsRadios1" value="{{$variant->id}}" checked=""></p>
                                        <p align="center"><img src="{{$variant->img}}" height="50%" width="50%"></p>
                                    </label>
                                    <div style="clear:both"></div>
                                    @endforeach
                                </div>
                            </div>

                            @endif
                            @if($question->type->name =="Вопрос с вводом пропущенных слов")

                            <p align="center"><b>Задание: Напишите пропущенные слова в соответвии с номером.</b></p>
                            <table align="center">
                                @foreach ($question->variants()->get() as $keyv=>$variant)
                                <tr>
                                    <td>{{$keyv+1}}<input type="text" name="{{$question->id}}[]"></td>
                                </tr>
                                @endforeach


                            </table>

                            @endif
                            @if($question->type->name =="Вопрос с выбором пропущенного слова")

                            <p align="center"><b>Задание: Вопрос с выбором пропущенного слова.</b></p>
                            <table align="center">
                            
                                <tr>
                                    <td> <select name="{{$question->id}}">
                                    @foreach ($question->variants()->get() as $keyv=>$variant)
                                    <option value="{{$variant->id}}">
                                                {{$variant->name}}
                                            </option>
                                    @endforeach
                                            
                                           
                                        </select></td>
                                </tr>
                            </table>
                            @endif
                        </fieldset>

                        @endforeach
                        <input type="hidden" name="slider_id" value="{{$slider->id}}">
                        @if (empty($slider->task->questions()->count()) == 0)
                        <button  type="submit" class="btn btn-success" >Завершить тест</button>
                        @endif
                    </form>
                </div>

            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
</div>
<!--/.fluid-container-->
@endsection