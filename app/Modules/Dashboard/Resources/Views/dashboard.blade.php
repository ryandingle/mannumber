@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="padding-top: 45px">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="jumbotron">
                    <h1>Welcome to Man Number</h1>
                    <p>Man Number System is use for generating new employee id for new Employees.</p><brr><br>
                    <p><a class="btn btn-primary btn-lg" href="{{ route('request') }}" role="button">Start Adding Employees</a></p>
                </div>
            </div>
        </div
        
    </section>
</div>
@endsection
