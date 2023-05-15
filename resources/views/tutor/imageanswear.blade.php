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
                <form method="post" action="{{url('/imageanswear')}}" enctype=multipart/form-data>
                    @csrf
                    <div class="field">
                        <p class="th1" align="center"><b style="color: black;">Задание: </b><textarea name="comment" cols="60" rows="1" placeholder="Добавте задание"></textarea></p>
                        
                    </div>
                    <input type="hidden" name="task_id" value="{{$task_id}}">
                    <p align="center"><input type="submit" name="ok" value="Создать"></p>

                </form>

                <div align="center">
                    <button onclick="addimageanswear()" class="add1">+</button>
                    <button onclick="removeimageanswear()" class="remove1">-</button>
                </div>

            </div>

        </div>
    </div>

</div>

</div>
<!--/.fluid-container-->
@endsection