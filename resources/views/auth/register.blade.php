@extends('auth.default')

@section('content-left')
    <div class="form_header">
        Sign Up<p>Fill in the form below to get instant access.</p>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <div class="col-md-12">
                <input placeholder="Name" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <select name="cat[]" class="form-control select_cat" multiple="multiple" required>
                    <option value="wedding">Wedding</option>
                    <option value="events">Events</option>
                    <option value="commercial">Commercial</option>
                    <option value="fashion">Fashin</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                {!! Form::select('job_fee',['0 - 5000'=>'0 - 5000 tk','5000 - 15000'=>'5000 - 15000 tk','15,000 - 30,000'=>'15,000 - 30,000 tk','30,000 - 50,000'=>'30,000 - 50,000 tk','50,000+'=>'50,000+ tk'],null,['id'=>'job_fee','class'=>'form-control','placeholder'=>'Select job fee range..','required'=>'true']) !!}
            </div>
        </div>


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


            <div class="col-md-12">
                <input placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


            <div class="col-md-12">
                <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">


            <div class="col-md-12">
                <input placeholder="Confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" style="width:100%;">
                    Sign me Up!
                </button>
            </div>
        </div>
        <p>By registering to <a href="#" target="_blank">PickR.com</a> using this form, you agree to our <a href="#" target="_blank">Terms & Conditions</a></p>
    </form>
@endsection
@section('content-right')
        <h1>Reigster to our Website</h1>
        <p><a href="#">PickR.com</a> helps you create your portfolio as a photographer. Let the world know about you and your work.
            Helping you become a successful photographer by bringing the people closer to you is our job.</p>
@endsection