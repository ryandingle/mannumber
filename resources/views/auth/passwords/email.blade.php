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
    <p class="login-box-msg">Reset Password</p>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" control-label">E-Mail Address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary pull-right">
                Send Password Reset Link
            </button>
        </div>
        <div class="form-group">
            <a class="btn btn-link" href="{{ route('login') }}">Back to Login</a>
        </div>
    </form>
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
