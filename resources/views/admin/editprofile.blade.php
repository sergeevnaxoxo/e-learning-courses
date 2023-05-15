@extends('layouts.appadmin')
@section('content')
<!-- start: Content -->
<div id="content" class="span10">

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Изменить профиль</h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{ url('/edit-profile') }}" method="POST">
                @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="focusedInput">ФИО</label>
                            <div class="controls">
                                <input name ="name" class="input-xlarge focused" id="focusedInput" type="text"  value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="focusedInput">Логин</label>
                            <div class="controls">
                            <input name ="email" class="input-xlarge focused" id="focusedInput" type="text"  value="{{$user->email}}">
                            </div>
                        </div>
                       
                        <div class="form-actions">
                        <input type="hidden" name="id" value="{{$user->id}}">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                    </fieldset>
                </form>

            </div>
            
        </div>
    </div>
</div>
<!--/.fluid-container-->
@endsection