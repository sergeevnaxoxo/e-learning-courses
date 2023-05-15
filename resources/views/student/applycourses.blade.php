@extends('layouts.appstudent')
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
                            <th>Руководитель</th>
                            <th>Количество заданий</th>
                            <th>Отправка заявки</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)

                       
                        @csrf
                            <tr>
                            @if (empty($course->studentCourses->where('course_id',$course->id)->where('student_id',Auth::user()->id)->first()))
                            <td>{{$course->id}}</td>
                                <td class="center">{{$course->name}}</td>
                                <td class="center">{{$course->tutor->name}}</td>
                                <td class="center">{{$course->sliders()->count()}}</td>
                                <td class="center">
                                
                               
                                <a class="btn btn-success noty" data-noty-options='{"text":"Заявка добавлена","layout":"bottomRight","type":"success"}' href="{{ url('/add-student-course') }}" onclick="event.preventDefault();
                                                     document.getElementById('student-course').submit();"> Отправить заявк</a>
                                <form id="student-course" action="{{ url('/add-student-course') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{$course->id}}">
                                </form>
                                
                                </td>
                            @else
                            <td>{{$course->id}}</td>
                            <td class="center">{{$course->name}}</td>
                                <td class="center">{{$course->tutor->name}}</td>
                                <td class="center">{{$course->sliders()->count()}}</td>
                                <td class="center">
                           @endif
                                
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