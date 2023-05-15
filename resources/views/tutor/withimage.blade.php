@extends('layouts.apptutor')
@section('content')

<!-- start: Content -->
<div id="content" class="span10">

    <div class="row-fluid">

        <div class="box black span12 noMargin" onTablet="span12" onDesktop="span12">
            <div class="box-header">
                <h2><i class="halflings-icon white check"></i><span class="break"></span>Тест </h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">
                <form method="post" action="{{url('/withimage')}}" enctype=multipart/form-data>
                    @csrf
                    <div class="field">
                        <p class="th1" align="center"><b style="color: black;">Задание: </b><textarea name="comment" cols="60" rows="1" placeholder="Добавте задание"></textarea></p>
                        <p align="center" style="color: black;">Загрузите изображение <input name="image" type="file"></p>
                        <p align="center"><b>Ответ: </b><input type="text" name="answeqr" placeholder="Добавьте ответ"></p>
                    </div>
                    <input type="hidden" name="task_id" value="{{$task_id}}">
                    <p align="center"><input type="submit" name="ok" value="Создать"></p>

                </form>

            </div>

        </div>
    </div>

</div>

</div>
<!--/.fluid-container-->
@endsection