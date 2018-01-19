@extends('layouts.app')
@section('content')
    <div class="jumbotron" style="padding:0;background:url({{url('/images/avatars/'.$user->user_id.'/avatar.jpg')}});background-size: cover">
        <div class="container-fluid"style="padding: 0;">
            <div class="span3 well" style="background:rgba(236,240,241,0.9);">
                <center>
                    <a href="#"><img src="{{asset('images/avatars/'.$user->user_id.'/avatar.jpg')}}" name="aboutme" width="140" height="140" class="img-circle err-img"></a>
                    <h2>{{$user->name}}</h2>
                    <input name="prof_rate" value="{{$averageRating}}" class="rating-loading prof_rate">
                    <span class="small" style="font-size: 9px;">{{$total_ratings}} &nbsp;<i class="fa fa-user"></i></span>
                    <p>Find me at: <a href="{{$user->fblink}}" target="_blank"><i class="fa fa-facebook-official"></i></a>
                        <a href="{{$user->twlink}}"><i class="fa fa-twitter-square"></i></a>
                        <a href="{{$user->instalink}}"><i class="fa fa-instagram"></i></a></p>
                    <a href="#hire" class="btn btn-warning btn-xs">Hire now</a>
                </center>
            </div>
    </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 profile-bio">
                <h4>About</h4>
                <ul>
                    <li class="list-unstyled">
                        <p>
                            {{$user->about}}
                            {{--The quick onyx goblin jumps over the lazy dwarf.--}}
                            {{--THE QUICK ONYX GOBLIN JUMPS OVER THE LAZY DWARF.--}}
                        </p>
                    </li>
                    <li class="list-unstyled">
                        <p>
                            Job fee: <span>৳</span> {{$user->job_fee}}
                        </p>

                    </li>
                </ul>
            </div>
            <div class="col-md-6 profile-contact">
                <h4>Contact info</h4>
                <p>
                    <ul>
                        <li class="list-unstyled"><i class="fa fa-envelope"></i> &nbsp; {{$user->email}}.</li>
                        <li class="list-unstyled"><i class="fa fa-map-marker"></i> &nbsp; {{$user->address}},{{$user->city}}.</li>
                        <li class="list-unstyled"><i class="fa fa-phone"></i> &nbsp; {{$user->phone}}.</li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
    <div class="container-fluid work_done">
        <div class="row">
            <div class="col-md-12 center">
                <h3>Work History</h3>
            </div>
        </div>
        <div class="row">
            @foreach($albums as $album)
                <div class="col-md-12 center">
                    <h4>{{$album->album_name}}</h4>
                </div>
                <div class="col-md-12">
                    <ul class="bxslider">
                        @for($x=1;$x<=$album->imageCount;$x++)
                            <li>
                                <div class="view">
                                    <div class="caption2">
                                        <p><a href="#" rel="tooltip" title="View" data-toggle="modal" data-target=".modal-image"><i class="fa fa-search fa-2x"></i> click to view</a></p>
                                    </div>
                                    {!! Html::image('/images/'.$user->user_id.'/albums/'.$album->album_name.'/'.$x.'.jpg','alt',['class'=>'album-img']) !!}
                                </div>
                            </li>
                        @endfor
                    </ul>
                    <ul class="control-box pager">
                        <li id="slider-prev" class="link-unstyled"></li>
                        <li id="slider-next" class="link-unstyled"></li>
                    </ul>
                </div>

            @endforeach
        </div>
    </div>

    <div class="container" id="down">
        <div class="row">
            <div class="col-md-12 center">
                <h3>Rate This Profle</h3>
            </div>
            <div class="col-md-12 center">
                @if(Auth::guest())
                <input id="input-5" name="input-5" value="3" class="rating-loading">
                @else
                    <input id="rating-by-users" name="input-5" value="3" class="rating-loading">
                @endif
                <span id="rate_cap"></span>
            </div>
        </div>
    </div>
    <div class="container-fluid" id='hire' style="background: #222">
        <div class="row">
            <div class="col-md-12 center">
                <h3 style="color: #fff;">Contact to Hire</h3>
            </div>
            <div class="col-md-8 col-md-offset-2">

                {!! Form::open(['url'=>'profile/contact/'.$user->user_id,'class'=>'form-horizontal']) !!}
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter name','required'=>'true']) !!}
                    </div>
                </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter email','required'=>'true']) !!}
                        </div>
                    </div>
                        <div class="form-group {{$errors->has('mobile')? 'has-error':''}}">
                            <div class="col-md-12">
                                {!! Form::text('mobile',null,['class'=>'form-control','placeholder'=>'Enter phone no..','required'=>'true']) !!}
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('mesg',null,['class'=>'form-control','placeholder'=>'Enter your message','rows'=>'7','required'=>'true']) !!}
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::submit('Send',['class'=>'form-control btn btn-warning']) !!}
                        </div>
                    </div>
                </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="container-fluid review">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="col-md-12 center">
                    <h4 style="border-bottom:2px solid #ccc;"><b>Reviews</b></h4>
                </div>
                <div class="col-md-12">
                    @if(Auth::user())
                    <div class="col-md-1 col-xs-2" style="padding: 0;"><img src="{{asset('images/avatars/'.Auth::user()->id.'/avatar.jpg')}}" class="review-img err-img"></div>
                    @else
                        <div class="col-md-1 col-xs-2" style="padding: 0;"><img src="{{asset('img/guest.png')}}"class="review-img"></div>
                    @endif
                    <div class="col-md-11 col-xs-10">
                    {!! Form::open(['url'=>'post/review/'.$user->user_id,'class'=>'form-horizontal']) !!}
                        <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::textarea('review',null,['required'=>'true','class'=>'form-control','rows'=>1,'placeholder'=>'Write review']) !!}
                                <div class="input-group-addon">
                                    @if(Auth::user())
                                        <div class="col-md-12 no-pad">
                                            <button class="btn btn-default review-btn">Post as {{Auth::user()->name}}</button>
                                        </div>
                                    @else
                                        <div class="col-md-4 no-pad">
                                            {!! Form::text('name',null,['placeholder'=>'enter name','class'=>'form-control']) !!}
                                        </div>
                                        <div class="col-md-4 no-pad">
                                            {!! Form::email('email',null,['placeholder'=>'enter email','class'=>'form-control']) !!}
                                        </div>
                                        <div class="col-md-4 col-xs-12 no-pad">
                                            <button class="btn btn-primary review-btn">Post as Guest</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                </div>
            @foreach($reviews as $review)
                <div class="col-md-12 col-xs-12" style="margin-bottom: 10px;">
                    <div class="col-md-1 col-xs-2" style="padding: 0;">
                        @if($review->rated_by =='guest')

                            <img src="{{asset('img/guest.png')}}"class="review-img">
                        @else
                            <img src="{{asset('images/avatars/'.$review->user_id.'/avatar.jpg')}}"class="review-img err-img">
                        @endif
                    </div>
                    <div class="col-md-11 col-xs-10">
                        <div style="color: #18bc9c">
                            {{$review->guest_name}}
                            <a href="{{url('view_profile/'.$review->user_id)}}">{{$review->name}}</a>
                            <small style="font-size: 70%;color: #0d3625;">{{Carbon\Carbon::parse($review->created_at)->diffForHumans()}}</small>
                        </div>
                    <div><p>{{$review->review}}</p></div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <div class="modal fade modal-image " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                    <h4 class="modal-title center" id="myLargeModalLabel-1">Image View</h4>
                </div>
                <div class="modal-body">
                    <div class="thumbnail">
                        {!! Html::image('','modal-image',['id'=>'modalImg','class'=>'img-responsive']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
        @if($to!=null)
            <script>
                $( document).ready(function () {
                    var hash = "#"+'{{$to}}';

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 1000, function(){

                        // Add hash (#) to URL when done scrolling (default click behavior)
//                        window.location.hash = hash;
                    });
                });
            </script>

        @endif
        @if(notify()->ready())
            <script>
                swal({
                    title:"{{notify()->message()}}",
                    text:"{!!notify()->option('text')!!}",
                    type:"{{notify()->type()}}",
                    @if(notify()->option('timer'))
                        timer:'{{notify()->option('timer')}}',
                    @endif
                    showCloseButton:true,
                })
            </script>
        @endif
    <script>
        function rating(value) {
            swal({
                title:'You rated : '+value,
                type:'info',
                showCancelButton:false,
                showCloseButton:true,
                confirmButtonColor: '#18bc9c',
                cancelButtonColor: '#d33',
                showConfirmButton:false,
                html:'<p class="text-info">Enter email to post review and rating</p>'+
                '{!! Form::open(['route'=>['post_rating',$user->user_id],'class'=>'form-horizontal']) !!}'+
                '<div class="form-group">' +
                '<div class="col-md-10 col-md-offset-1">' +
                "<input name='rating' value="+value+" type='hidden'>" +
                '</div></div>'+
                ' <div class="form-group">' +
                    '<div class="col-md-10 col-md-offset-1">'+
                        '{!! Form::email('email',null,['required'=>'true','placeholder'=>'enter email','class'=>'form-control']) !!}'+
                    '</div></div><div class="form-group"><div class="col-md-10 col-md-offset-1">' +
                        '{!! Form::submit('Post',['class'=>'btn btn-success','style'=>'width:100%;']) !!}'+
                    '</div></div>'+
                '{!! Form::close() !!}'
            }).then(function () {
                swal({
                    title:'Done!',
                    text:'Your review has been posted.',
                    type:'success',
                    timer:2000
                }
                )
            })
        };
        $(document).ready(function(){
            $("#input-5").rating({
                size:'sm',
                step: 1,
                starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Okay', 4: 'Good', 5: 'Very Good'},
                captionElement:'#rate_cap',
                starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
            }).on("rating.clear", function(event) {
                alert("Your rating is reset")
            }).on("rating.change", function(event, value, caption) {
//                alert("You rated: " + value + " = " + $(caption).text());
//                $("#input-5").rating("refresh", {disabled:true, showClear:false});
                rating(value);
            });
            $("#rating-by-users").rating({
                size:'sm',
                step: 1,
                starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Okay', 4: 'Good', 5: 'Very Good'},
                captionElement:'#rate_cap',
                starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
            }).on("rating.clear", function(event) {
                alert("Your rating is reset")
            }).on("rating.change", function(event, value, caption) {
                swal({
                    title: 'You rated : ' + value,
                    type: 'info',
                    showCancelButton: true,
                    showCloseButton: true,
                    confirmButtonColor: '#18bc9c',
                    cancelButtonColor: '#d33',
                    confirmButtonText:'Post Rating',
                }).then(function () {
                    window.location='{{url('/profile/'.$user->user_id)}}/'+value;
                });

            })
        });
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: false
            })
        });
        $(".caption2").click(function(){
            var src=$(this).parent().children('img').attr('src');
            $("#modalImg").attr("src",src);
        });
        $(".album-img").click(function(){
            $("#modalImg").attr("src",$(this).attr('src'));
        });
        $( document).ready(function(){
            // Add smooth scrolling to all links
            $("a").click(function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>

@endsection
