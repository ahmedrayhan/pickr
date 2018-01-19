<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    {{--icons--}}
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('favicon/apple-icon-57x57.png')}}"">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#2c3e50">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#2c3e50">
    {{--icons--}}
    {{--<link rel="icon" href="{{asset('favicon.ico')}}">--}}
    <!-- Styles -->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    {{--<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css" rel="stylesheet" integrity="sha384-Xqcy5ttufkC3rBa8EdiAyA1VgOGrmel2Y+wxm4K3kI3fcjTWlDWrlnxyD6hOi3PF" crossorigin="anonymous">--}}
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-+ENW/yibaokMnme+vBLnHMphUYxHs34h9lpdbSLuAwGkOKFRl4C34WkjazBtb7eT" crossorigin="anonymous">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style2.css')}}" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script>
        $( document).ready(function () {
            $( '.err-img').error(function () {
                $(this).attr('src','{{asset('img/defaultav.jpg')}}')
            })
        });
    </script>
    <style>
        .carousel-caption h1{
           font-size: 6vmin;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row" style="padding: 10px;">
        <a href="{{url('/register')}}" class="btn btn-warning btn-block btn-xs right">Are you a photographer ?</a>
    </div>
</div>

@include('partials.nav')
<!--slider start-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="{{asset('img/love.jpg')}}" alt="Love" class="img-responsive">
        </div>
        <div class="item">
            <img src="{{asset('img/home.jpg')}}" alt="Home" class="img-responsive">
        </div>
        <div class="item">
            <img src="{{asset('img/wedd.jpg')}}" alt="wedd" class="img-responsive">
        </div>
        <div class="carousel-caption">
            <h1>Welcom to <span style="color: #18bc9c">PickR.com</span> <small style="color:#fff;"> help you pick!</small></h1>
        </div>
        {{--<a href="{{url('/')}}"><div class="carousel-caption">--}}
            {{--<center><img src="{{asset('img/camera.png')}}" class="img-responsive"></center>--}}
        {{--</div></a>--}}
    </div>
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span></a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span></a>
</div>
<!--slider end-->

@yield('content')
@include('partials.footer')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('js/jquery.backstretch.min.js')}}" type="text/javascript"></script>
<script>
    $( document).ready(function() {

        /*
         Background slideshow
         */
        $('.testimonials-container').backstretch([
            "{{asset('img/backgrounds/1.jpg')}}"
            , "{{asset('img/backgrounds/2.jpg')}}"
        ], {duration: 3000, fade: 750});

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(){
            $('.testimonials-container').backstretch("resize");
        });
    });

</script>
<script src="{{asset('js/script.js')}}" type="text/javascript"></script>
</body>
</html>