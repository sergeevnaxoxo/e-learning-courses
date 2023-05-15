@extends('layouts.appadmin')
@section('content')
<div id="content" class="span10">

    <div class="row-fluid">

        <div class="box black span12 noMargin" onTablet="span12" onDesktop="span12">
            <div class="box-header">
                <h2><i class="halflings-icon white check"></i><span class="break"></span>Добавить пользователя</h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">
                <div class="todo metro">
                    <div class="card-body">
                        <form method="POST" action="{{ url('/add-user') }}">
                            @csrf

                            <div align="center" class="form-group row">
                                <label style="color: black;" for="name" class="col-md-4 col-form-label text-md-right">ФИО</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div align="center" class="form-group row">
                                <label style="color: black;" for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div align="center" class="form-group row">
                                <label style="color: black;" for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div align="center" class="form-group row">
                                <label style="color: black;" for="password-confirm" class="col-md-4 col-form-label text-md-right">Повторить пароль</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div align="center" class="control-group">
                                <label class="control-label" for="selectError3">Роль</label>
                                <div class="controls">
                                    <select id="selectError3" name="role">
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                       
                                    </select>
                                </div>
                            </div>

                            <div align="center" class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Добавить нового пользователя
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!--/.fluid-container-->
@endsection