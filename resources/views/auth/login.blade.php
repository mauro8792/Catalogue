@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/madera1.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="header header-warning text-center t-black">
                            <h3>Inicio de sesión</h3>
                        </div>
                        <p class="text-divider">Ingresa tus datos</p>
                        <div class="content">

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>                                
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                 @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }} </strong>
                                    </span>
                                @endif
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Recordar sesión
                                </label>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-warning t-black ">Ingresar</button>
                        </div>
                        <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
