@extends('layouts.apptutor')
@section('content')
<div id="content" class="span10">

    <div class="row-fluid sortable">
        <div class="box span12">



            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Тема</h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">

                <form class="form-horizontal">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Наименование задачи</label>
                            <div class="controls">
                                <input name="nameSlider" class="input-xlarge focused" id="focusedInput" type="text" value="{{$slider->name}}" disabled>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Степень</label>
                            <div class="controls">
                                <input name="numberSlider" class="input-xlarge focused" id="focusedInput" type="text" value="{{$slider->number}}" disabled>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Описание</label>
                            <div class="controls">
                                <textarea name="descritionSlider" id="textarea2" rows="3" style="width: 700px;height: 250px;" disabled>{{$slider->descrition}}</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Максимальный балл</label>
                            <div class="controls">
                                <input name="maxpointsSlider" class="input-xlarge focused" id="focusedInput" type="text" value="{{$slider->maxpoints}}" disabled>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Минимальный балл</label>
                            <div class="controls">
                                <input name="minpointsSlider" class="input-xlarge focused" id="focusedInput" type="text" value="{{$slider->minpoints}}" disabled>
                            </div>
                        </div>
                        <div class="form-actions">

                        </div>
                    </fieldset>
                </form>
            </div>
            @if (!empty($slider->task))
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Редактирование теста</h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Вопрос</th>
                            <th>Тип вопроса</th>
                            <th>Удалить</th>

                        </tr>
                    </thead>

                    <tbody>
                        @if (!empty($slider->task) and !empty($slider->task->questions()))
                        @foreach ($slider->task->questions()->get() as $question)
                        <tr>
                            <td>{{$question->id}}</td>
                            <td class="center">{{$question->name}}</td>
                            <td class="center">{{$question->type->name}}</td>
                            <td class="center">
                                <form id="inactive-question" action="{{ url('/inactive-question') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$question->id}}">
                                    <button class="btn btn-danger" type="submit">Удалить</button>

                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @endif

                    </tbody>



                </table>
                <form class="form-horizontal" action="{{ url('/generate-add-question') }}" method="GET">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Тип вопроса</label>
                            <div class="controls">
                                <select name="type_name" id="selectError3">
                                    @foreach ($types as $type)
                                    <option value="{{$type->name}}">{{$type->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            @if (!empty($slider->task->id))
                            <input type="hidden" name="task_id" value="{{$slider->task->id}}">
                            <button type="submit" class="btn btn-primary green">Добавить</button>
                            @endif


                        </div>
                    </fieldset>
                </form>

            </div>
            @endif
            @if(!empty($slider->training))
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Лекция</h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Наименование</th>
                            <th>Описание</th>
                            <th>Удалить</th>

                        </tr>
                    </thead>

                    <tbody>
                        @if (!empty($slider->training))

                        <tr>
                            <td>{{$slider->training->id}}</td>
                            <td class="center">{{$slider->training->name}}</td>
                            <td class="center">{{$slider->training->description}}</td>
                            <td class="center">
                                <form id="inactive-training" action="{{ url('/inactive-training') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$slider->training->id}}">
                                    <button class="btn btn-danger" type="submit">Удалить</button>

                                </form>
                            </td>
                        </tr>


                        @endif

                    </tbody>

                </table>


            </div>
            @endif
            @if (empty($slider->training_id) and empty($slider->task))
            <div class="box-header green" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Добавить лекцию</h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">

                <form class="form-horizontal" action="{{ url('/add-training') }}" method="POST">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Наименование тренировки</label>
                            <div class="controls">
                                <input name="name" class="input-xlarge focused" id="focusedInput" type="text">
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Описание</label>
                            <div class="controls">
                                <textarea name="descrition" id="textarea2" rows="3" style="width: 700px;height: 250px;"></textarea>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Материал</label>
                            <div class="controls">
                                <textarea name="text" id="textarea2" rows="3" style="width: 700px;height: 250px;"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Балл</label>
                            <div class="controls">
                                <input name="points" class="input-xlarge focused" id="focusedInput" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Ссылка на материал</label>
                            <div class="controls">
                                <input name="linkmaterial" class="input-xlarge focused" id="focusedInput" type="text">
                            </div>
                        </div>

                        <div class="form-actions ">
                            <input type="hidden" name="slider_id" value="{{$slider->id}}">
                            <button type="submit" class="btn btn-primary green">Добавить тренировку</button>

                        </div>
                    </fieldset>
                </form>
            </div>
            @endif

            @if (empty($slider->task_id) and empty($slider->training_id))
            <div class="box-header green" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Добавить тест</h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">

                <form class="form-horizontal" action="{{ url('/add-task') }}" method="POST">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Наименование задачи</label>
                            <div class="controls">
                                <input name="nameTest" class="input-xlarge focused" id="focusedInput" type="text">
                            </div>
                        </div>

                        <div class="form-actions ">
                            <input type="hidden" name="slider_id" value="{{$slider->id}}">
                            <button type="submit" class="btn btn-primary green">Добавить тест</button>

                        </div>
                    </fieldset>
                </form>
            </div>
            @endif


        </div>
    </div>
</div>
<!--/.fluid-container-->

@endsection