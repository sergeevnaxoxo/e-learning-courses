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
                    </fieldset>
                </form>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Наименование курса</th>
                            <th>Дата завки</th>
                            <th>Студент</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tutorCourses as $tutorCourse)
                        @foreach ($tutorCourse->requests()->where('status',0)->get() as $request)


                        <tr>
                        <td>{{$request->id}}</td>
                            <td>{{$request->course->name}}</td>
                            <td class="center">{{$request->created_at}}</td>
                            <td class="center"><b>ФИО: {{$request->student->name}}</b> | Логин: {{$request->student->email}}</td>
                            <td class="center">
                                <a class="btn btn-success noty" data-noty-options='{"text":"Заявка одобрена","layout":"bottomRight","type":"success"}' href="{{ url('/active-request') }}" onclick="event.preventDefault();
                                                     document.getElementById('active-request').submit();"> Записать</a>
                                <form id="active-request" action="{{ url('/active-request') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="request_id" value="{{$request->id}}">
                                </form>

                            </td>
                            <td class="center">
                                <a class="btn btn-danger noty" data-noty-options='{"text":"Заявка удалена","layout":"bottomRight","type":"erro"}' href="{{ url('/inactive-request') }}" onclick="event.preventDefault();
                                                     document.getElementById('inactive-request').submit();"> Удалить</a>
                                <form id="inactive-request" action="{{ url('/inactive-request') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="request_id" value="{{$request->id}}">
                                </form>

                            </td>

                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>

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