@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}">
            <img class="img-responsive" src="{{ asset('img/sm_logo.png') }}" width="40%" style="margin: 0px auto">
            <b>Man</b>Number
        </a>
    </div>

    <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

     <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}  has-feedback">
            <!-- <label for="username">SSS No.</label> -->
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <input placeholder="Username" id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus>
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
            <!-- <label for="password">Password</label> -->
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <input placeholder="Password" id="password" type="password" class="form-control" name="password" autocomplete="off">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
        </div>
    </form>
    @if(env('MAIL_ACTIVATE') == 1)
    <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
    @endif
    <br>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('admin/plugins/iCheck/square/blue.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('admin/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
@endpush
