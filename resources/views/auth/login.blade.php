@extends('auth.default')

@section('content-left')
    <div class="form_header">
        Sign In
    </div>
    {!! Form::open(['url'=>'/login','class'=>'form-horizontal']) !!}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <input id="email" placeholder="Enter email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12 col-md-12 col-xs-12">
            <button class="btn btn-danger " style="width: 100%;">Sign In</button>
        </div>
    </div>

    <div class="form-group">
        <label style="color: #5e5e5e;margin-left:5%;font-size: 12px; cursor: pointer;">
            <input type="checkbox" name="remember"> Remember Me
        </label>
        <a class="btn btn-link" href="{{ url('/password/reset') }}" style="font-size: 12px;">
            Forgot My Password
        </a>
    </div>
    {!! Form::close() !!}
        <div class="col-sm-12 col-md-12 col-xs-12 center">
            or <a href="{{url('/register')}}"> Sign Up</a>
        </div>

@endsection
@section('content-right')
    <h1>Welcome Back!</h1>
    <p>Get back to your profile.</p>
@endsection