@extends('layouts.app1')
@section('content')
    {{--<div class="flex-center position-ref full-height">--}}
            {{--<div class="content">--}}
                {{--<div class="title m-b-md">--}}
                    {{--{{config('app.name')}}--}}
                {{--</div>--}}

                {{--<div class="links">--}}

                {{--</div>--}}
            {{--</div>--}}


        {{--</div>--}}
    <div class="container hiw">
        <div class="row">
                <div class="col-md-12 center">
                    <h2>How it Works</h2>
                </div>
            </div>
        <div class="row no-pad">
                <div class="col-md-4 jumbotron">
                    <div class="jumbo-header"><i class="fa fa-search fa-4x" aria-hidden="true"></i></div>
                    <h4>Find</h4>
                    <p>Find the photographer you are looking for. View the profiles and
                    Pick the best one. </p>
                </div>
                <div class="col-md-4 jumbotron">
                    <div class="jumbo-header"><i class="fa fa-comments fa-4x" aria-hidden="true"></i></div>
                    <h4>Contact</h4>
                    <p>Once selected, contact the photographer. Finalise the job and
                        make sure they are available.</p>
                </div>
                <div class="col-md-4 jumbotron">
                    <div class="jumbo-header"><i class="fa fa-handshake-o fa-4x" aria-hidden="true"></i></div>
                    <h4>Hire</h4>
                    <p>Everything worked well so far? Now hire the photographer and stop worrying about this at all.
                    Job done!</p>
                </div>
            </div>
    </div>
    <div class="testimonials-container section-container section-container-image-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 testimonials section-description">
                    <h2 class="center">Featured Profiles</h2>
                    <div class="divider-1"><div class="line"></div></div>
                    <p class="medium-paragraph">Take a look below to find out some talented photographers:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 testimonial-list">
                    <div role="tabpanel">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @foreach($photographers as $photographer)
                                @if($photographer->id==1)
                            <div role="tabpanel" class="tab-pane fade in active" id="tab{{$photographer->id}}">
                                @else
                                    <div role="tabpanel" class="tab-pane fade in" id="tab{{$photographer->id}}">
                                 @endif
                                <div class="testimonial-image">
                                    <img src="{{asset("images/avatars/".$photographer->id."/avatar.jpg")}}" alt="t1">
                                </div>
                                <div class="testimonial-text">
                                    <p>

                                        <a href="#">{{$photographer->name}}</a>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"></a>
                            </li>
                            <li role="presentation">
                                <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"></a>
                            </li>
                            <li role="presentation">
                                <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"></a>
                            </li>
                            <li role="presentation">
                                <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container wp">
        <div class="row">
            <div class="col-md-12 center">
                <h2>Why PickR</h2>
            </div>
        </div>
        <div class="row no-pad">
            <div class="col-md-4 jumbotron">
                <div class="jumbo-header"><i class="fa fa-lock fa-4x" aria-hidden="true"></i></div>
                <h4>Safe & Secure</h4>
                <p>All the profiles are verified. We ensure quality and genuine photographers. No fake profiles.</p>
                <a href="#" class="btn btn-warning btn-sm">Find Photographer</a>
            </div>
            <div class="col-md-4 jumbotron">
                <div class="jumbo-header"><i class="fa fa-flash fa-4x" aria-hidden="true"></i></div>
                <h4>Simple & Fast</h4>
                <p>Take advantage of the largest group of photographers we offer. Save some time and energy. </p>
                <a href="#" class="btn btn-warning btn-sm">Find Photographer</a>
            </div>
            <div class="col-md-4 jumbotron">
                <div class="jumbo-header"><i class="fa fa-address-card fa-4x" aria-hidden="true"></i></div>
                <h4>Career Builder</h4>
                <p>New to the photography world ? PickR is the perfect place to boost up your career. Join us Now!</p>
                <a href="{{url('/register')}}" class="btn btn-warning btn-sm">Join PickR</a>
            </div>
        </div>
    </div>
@endsection
