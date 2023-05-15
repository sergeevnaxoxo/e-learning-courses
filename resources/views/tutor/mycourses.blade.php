@extends('layouts.apptutor')
@section('content')
<div id="content" class="span10">

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white briefcase"></i><span class="break"></span>Курсы</h2>
            <div class="box-icon">
                <a class="btn-setting"><i></i></a>
                <a class="btn-minimize"><i></i></a>
                <a class="btn-close"><i></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal">
                <fieldset>
                <a class="btn btn-success" href="/open-add-course" > Добавить</a>
                </fieldset>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Наименование курса</th>
                        <th>Описание</th>
                        <th>Количество заданий</th>
                        <th>Изменить</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)

                   
                    @csrf
                        <tr>
                        
                        <td class="center">{{$course->id}}</td>
                            <td class="center">{{$course->name}}</td>
                            <td class="center">{{Str::substr($course->description,0,100)}}...</td>
                            <td class="center">{{$course->sliders()->count()}}</td>
                            <td class="center">
                            <a class="btn btn-success" href="/open-edit-course/{{$course->id}}"> Изменить</a>
                       
                        </tr>
                        
                    
                    @endforeach
                </tbody>
            </table>
            <div class="pagination pagination-centered">

                <ul>
                    {{$courses->links("pagination::bootstrap-4")}}

                </ul>
            </div>
        </div>
    </div>
    <!--/span-->

</div>
<!--/row-->




</div>
<!--/.fluid-container-->

<!-- end: Content -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
@endsection