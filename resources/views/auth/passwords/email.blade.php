@extends('auth.default')

<!-- Main Content -->
@section('content-left')
     @if (session('status'))
         <div class="alert alert-success">
             {{ session('status') }}
         </div>
     @endif
     <div class="form_header">
         Reset Password
     </div>
     <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{--<label for="email" class="col-md-12 control-label">E-Mail Address</label>--}}

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input placeholder="Enter email address" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>

@endsection
@section('content-right')
    <h1>Forgot password?</h1>
    <p>No problem. A password reset link will be sent to your Email address upon success. Visit the link and reset your password. Simple!</p>
@endsection