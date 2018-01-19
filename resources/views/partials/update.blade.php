@extends('layouts.app')
@section('content')
    <div class="container-fluid col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Update Information</h4>
                </div>
            </div>
            <div class="panel-body">
                {!! Form::model($info,['url'=>'/profile/update','class'=>'form-horizontal']) !!}
                    <div class="form-group {{$errors->has('about')?'has-error':''}}">
                        <label class="col-md-4 control-label style-4-label" for="user_name" >About You:</label>
                        <div class="col-md-6">
                            {!! Form::textarea('about',null,['id'=>'about','class'=>'style-4','rows'=>'5','autofocus'=>'true','required'=>'true']) !!}
                            @if ($errors->has('about'))
                            <span class="help-block">
                            <strong>{{ $errors->first('about') }}</strong>
                            </span>
                            @endif
                        </div>

                    </div>
                    <div class="form-group {{$errors->has('address')?'has-error':''}}">
                        <label class="col-md-4 control-label style-4-label" for="address" >Address:</label>
                        <div class="col-md-6">
                        {!! Form::text('address',null,['id'=>'address','class'=>'style-4','required'=>'true']) !!}
                        @if ($errors->has('address'))
                            <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group {{$errors->has('phone')?'has-error':''}}">
                        <label class="col-md-4 control-label style-4-label" for="phone" >Phone:</label>
                        <div class="col-md-6">
                        {!! Form::text('phone',null,['id'=>'phone','class'=>'style-4','required'=>'true']) !!}
                        @if ($errors->has('phone'))
                            <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group {{$errors->has('city')?'has-error':''}}">
                        <label class="col-md-4 control-label style-4-label" for="city" >City:</label>
                        <div class="col-md-6">
                        {!! Form::text('city',null,['id'=>'city','class'=>'style-4','required'=>'true']) !!}
                        @if ($errors->has('city'))
                            <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label style-4-label" for="category" >Category:</label>
                        <div class="col-md-6">
                            <select name="cat[]" class="form-control select_cat" multiple="multiple">
                                <option value="wedding">Wedding</option>
                                <option value="events">Events</option>
                                <option value="commercial">Commercial</option>
                                <option value="fashion">Fashin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label style-4-label" for="category" >Job fee: <span style="color: #18bc9c"> BDT (৳)</span></label>
                        <div class="col-md-6">
                        {!! Form::select('job_fee',['0 - 5000'=>'0 - 5000 tk','5000 - 15000'=>'5000 - 15000 tk','15,000 - 30,000'=>'15,000 - 30,000 tk','30,000 - 50,000'=>'30,000-50,000 tk','50,000+'=>'50,000+ tk'],null,['id'=>'job_fee','class'=>'form-control','placeholder'=>'Select job fee range..']) !!}
                    </div>
                </div>
                    <div class="form-group {{$errors->has('fblink')?'has-error':''}}">
                        <label class="col-md-4 control-label style-4-label" for="fblink" >Facebook Link:</label>
                        <div class="col-md-6">
                        {!! Form::text('fblink',null,['id'=>'fblink','class'=>'style-4','placeholder'=>'Optional']) !!}
                        @if ($errors->has('fblink'))
                            <span class="help-block">
                            <strong>{{ $errors->first('fblink') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group {{$errors->has('twlink')?'has-error':''}}">
                        <label class="col-md-4 control-label style-4-label" for="twlink" >Twitter Link:</label>
                        <div class="col-md-6">
                        {!! Form::text('twlink',null,['id'=>'twlink','class'=>'style-4','placeholder'=>'Optional']) !!}
                        @if ($errors->has('twlink'))
                            <span class="help-block">
                            <strong>{{ $errors->first('twlink') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group {{$errors->has('instalink')?'has-error':''}}">
                        <label class="col-md-4 control-label style-4-label" for="instalink" >Instagram Link:</label>
                        <div class="col-md-6">
                        {!! Form::text('instalink',null,['id'=>'instalink','class'=>'style-4','placeholder'=>'Optional']) !!}
                        @if ($errors->has('instalink'))
                            <span class="help-block">
                            <strong>{{ $errors->first('instalink') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Update info',['class'=>'btn btn-primary','style'=>'width:70%;']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
            @if($errors->any())
                @foreach($errors as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
    </div>
@endsection