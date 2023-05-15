@extends('layouts.apptutor')
@section('content')
<!-- start: Content -->
<div id="content" class="span10">

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Добавление курса</h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{ url('/add-course') }}" method="POST">
                @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Наименование курса</label>
                            <div class="controls">
                                <input name ="nameCourse" class="input-xlarge focused" id="focusedInput" type="text" >
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Описание</label>
                            <div class="controls">
                                <textarea name ="descriptionCourse" id="textarea2" rows="3" style="width: 700px;height: 250px;"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">Максимальный балл</label>
                            <div class="controls">
                                <input name ="maxpoinCourse" class="input-xlarge focused" id="focusedInput" type="text" value="">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Создать курс</button>
                        </div>
                    </fieldset>
                </form>

            </div>
            
        </div>
    </div>
</div>
<!--/.fluid-container-->



@endsection