
<!-- start: Notifications Dropdown -->
<li class="dropdown hidden-phone">
    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="icon-calendar"></i>
        <span class="badge red">
            {{$studentCourses->count()}} </span>
    </a>
    <ul class="dropdown-menu tasks">
        <li class="dropdown-menu-title">
            <span>Ваши курсы</span>

        </li>
        @foreach ($studentCourses as $studentCourse)
        <li style="font-size: 0px;">
            <a href="/slider-details/{{$studentCourse->course->id}}">
                <span class="header">
                    <span class="title">{{$studentCourse->course->name}}</span>
                    <span class="percent"></span>
                </span>
                <div class="taskProgress progressSlim red">{{$studentCourse->totalpoints}}</div>
            </a>
        </li>
        @endforeach
    </ul>
</li>
<!-- end: Notifications Dropdown -->
