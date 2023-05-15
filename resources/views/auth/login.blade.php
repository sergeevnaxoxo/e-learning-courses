@extends('layouts.auth')
@section('content')
<div class="container-fluid-full">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a><i></i></a>
                    <a><i></i></a>
                </div>
                <h2>Вход в свой аккаунт</h2>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                @csrf

                        <div class="input-prepend" title="Логин">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="email" id="username" type="text" placeholder="Логин" />
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Пароль">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="password" id="password" type="password" placeholder="Пароль" />
                        </div>
                        <div class="clearfix"></div>

                        <div class="button-login">
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </div>
                        <div class="clearfix"></div>
                </form>
                <hr>

            </div>
            <!--/span-->
        </div>
        <!--/row-->


    </div>
    <!--/.fluid-container-->

</div>
<!--/fluid-row-->
@endsection
