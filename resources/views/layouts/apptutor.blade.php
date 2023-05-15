<!DOCTYPE html>
<html lang="en">

<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Веб-среда для создания электронных обучающих курсов</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.min.css" rel="/stylesheet">
    <link id="base-style" href="/css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="/css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- end: Favicon -->

</head>

<body>
    <!-- start: Header -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="index.html"><span>Веб-среда для создания электронных обучающих курсов</span></a>

                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">
                    <ul class="nav pull-right">
                        <!-- start: User Dropdown -->
                        <li class="dropdown">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white user"></i> {{Auth::user()->name}}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-title">
                                    <span>Настройки</span>
                                </li>
                                <li><a href="/edit-profile"><i class="halflings-icon user"></i> Профиль</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="halflings-icon off"></i> Выйти</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </ul>

                        </li>
                        <!-- end: User Dropdown -->
                    </ul>
                </div>
                <!-- end: Header Menu -->

            </div>
        </div>
    </div>
    <!-- start: Header -->

    <div class="container-fluid-full">
        <div class="row-fluid">

            <!-- start: Main Menu -->
            <div id="sidebar-left" class="span2">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li><a href="/home-tutor"><i class="icon-list-alt"></i><span class="hidden-tablet"> Главная</span></a></li>
                        <li><a href="/chenge-request"><i class="icon-external-link"></i><span class="hidden-tablet"> Заявки на курсы</span></a></li>
                        <li><a href="/my-courses-tutor"><i class="icon-briefcase"></i><span class="hidden-tablet">Мои курсы</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- end: Main Menu -->

            @yield('content')

        </div>
        <!--/#content.span10-->
    </div>
    <!--/fluid-row-->

    <footer>

        <p>
        <span style="text-align:left;float:left">&copy; 2021 <a href="/" alt="Bootstrap_Metro_Dashboard">Веб-среда для создания электронных обучающих курсов</a></span>
        </p>

    </footer>

    <!-- start: JavaScript-->
    <script src="/js/scripts.js"></script>
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/jquery-migrate-1.0.0.min.js"></script>

    <script src="/js/jquery-ui-1.10.0.custom.min.js"></script>

    <script src="/js/jquery.ui.touch-punch.js"></script>

    <script src="/js/modernizr.js"></script>

    <script src="/js/bootstrap.min.js"></script>

    <script src="/js/jquery.cookie.js"></script>

    <script src='/js/fullcalendar.min.js'></script>

    <script src='/js/jquery.dataTables.min.js'></script>

    <script src="/js/excanvas.js"></script>
    <script src="/js/jquery.flot.js"></script>
    <script src="/js/jquery.flot.pie.js"></script>
    <script src="/js/jquery.flot.stack.js"></script>
    <script src="/js/jquery.flot.resize.min.js"></script>

    <script src="/js/jquery.chosen.min.js"></script>

    <script src="/js/jquery.uniform.min.js"></script>

    <script src="/js/jquery.cleditor.min.js"></script>

    <script src="/js/jquery.noty.js"></script>

    <script src="/js/jquery.elfinder.min.js"></script>

    <script src="/js/jquery.raty.min.js"></script>

    <script src="/js/jquery.iphone.toggle.js"></script>

    <script src="/js/jquery.uploadify-3.1.min.js"></script>

    <script src="/js/jquery.gritter.min.js"></script>

    <script src="/js/jquery.imagesloaded.js"></script>

    <script src="/js/jquery.masonry.min.js"></script>

    <script src="/js/jquery.knob.modified.js"></script>

    <script src="/js/jquery.sparkline.min.js"></script>

    <script src="/js/counter.js"></script>

    <script src="/js/retina.js"></script>

    <script src="/js/custom.js"></script>
    <!-- end: JavaScript-->

</body>

</html>