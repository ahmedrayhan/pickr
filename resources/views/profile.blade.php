@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row user-menu-container">
        <div class="col-md-4 user-details">
            <div class="row coralbg white">
                <div class="col-md-12 no-pad">
                    <div class="user-pad">
                        <h3>Welcome {{$user->name}}</h3>
                        <h4 class="white"><i class="fa fa-check-circle-o"></i> San Antonio, TX</h4>
                        <a href="#"><h4 class="white"><i class="fa fa-facebook-official"></i>&nbsp; {!! $user->name !!}</h4></a>
                        <a type="button" class="btn btn-labeled btn-info" href="{{route('update-user-info',[Crypt::encrypt($user->id)])}}">
                            <span class="btn-label"><i class="fa fa-pencil"></i></span>Update</a>
                    </div>
                </div>
                <div class="col-md-12 no-pad">
                    <div class="user-image">
                        <img id="dp"  src="{{asset('images/avatars/'.$user->id.'/avatar.jpg')}}" onerror="standby()" class="img-responsive">
                        <a href="#" data-toggle="modal" data-target=".upload_avatar" class="img_up"><span><i class="fa fa-camera"></i> </span>Update avatar</a>
                    </div>
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-12 user-pad text-center">
                    <h3>RATINGS</h3>
                    <h4><input class="prof_rate" name="prof_rate" value="{{$user->rating}}" class="rating-loading"></h4>
                    <span class="small">{{$total_ratings}}</span>
                </div>
                <div class="col-md-12 user-pad text-center">
                    <h3>FOLLOWING</h3>
                    <h4>456</h4>
                </div>
                <div class="col-md-12 user-pad text-center">
                    <h3>APPRECIATIONS</h3>
                    <h4>4,901</h4>
                </div>
            </div>
        </div>
        <div class="col-md-8 user-menu" style="padding:0 ">
            <div class="container-fluid" style="padding: 0;">
            <div class="user-menu-btns">
                <div class="btn-group-justified square" id="responsive">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fa fa-bell-o fa-3x"></i>
                    </a>
                    <a href="#" class="btn btn-primary">
                        <i class="fa fa-envelope-o fa-3x"></i>
                    </a>
                    <a href="#images" class="btn btn-primary active">
                        <i class="fa fa-picture-o fa-3x"></i>
                    </a>
                    <a href="#" class="btn btn-primary ">
                        <i class="fa fa-cloud-upload fa-3x"></i>
                    </a>
                </div>
            </div>
            </div>

            <div class="user-menu-content">
                <h2>
                    Recent Interactions
                </h2>
                <ul class="user-menu-list">
                        @if(notify()->ready())
                            <script>
                                swal({
                                    title:"{{notify()->message()}}",
                                    text:"{!!notify()->option('text')!!}",
                                    type:"{{notify()->type()}}",
                                    @if(notify()->option('error'))
                                            confirmButtonText:'Ok',
                                            showCacelButton:false,
                                    @else
                                    confirmButtonText:
                                            '<a  style="color:#fff;text-decoration:none;display:block;"href="{{route('update-user-info',[Crypt::encrypt($user->id)])}}">Now</a>',
                                            showCancelButton:true,
                                    @endif
                                    showCloseButton:true,
                                    cancelButtonText:'Later',
                                })
                            </script>
                    @endif
                    <li>
                        <h4><i class="fa fa-user coral"></i> Roselynn Smith followed you.</h4>
                    </li>
                    <li>
                        <h4><i class="fa fa-heart-o coral"></i> Jonathan Hawkins followed you.</h4>
                    </li>
                    <li>
                        <h4><i class="fa fa-paper-plane-o coral"></i> Gracie Jenkins followed you.</h4>
                    </li>
                    <li>
                        <button type="button" class="btn btn-outline btn-warning">Warning</button>

                        <button type="button" class="btn btn-labeled btn-success" href="#">
                            <span class="btn-label"><i class="fa fa-bell-o"></i></span>View all activity</button>
                    </li>
                </ul>
            </div>
            <div class="user-menu-content">
                <h2>
                    Your Inbox
                </h2>
                <ul class="user-menu-list">
                    <li>
                        <h4>From Roselyn Smith <small class="coral"><strong>NEW</strong> <i class="fa fa-clock-o"></i> 7:42 A.M.</small></h4>
                    </li>
                    <li>
                        <h4>From Jonathan Hawkins <small class="coral"><i class="fa fa-clock-o"></i> 10:42 A.M.</small></h4>
                    </li>
                    <li>
                        <h4>From Georgia Jennings <small class="coral"><i class="fa fa-clock-o"></i> 10:42 A.M.</small></h4>
                    </li>
                    <li>
                        <button type="button" class="btn btn-labeled btn-danger" href="#">
                            <span class="btn-label"><i class="fa fa-envelope-o"></i></span>View All Messages</button>
                    </li>
                </ul>
            </div>
            <div class="user-menu-content active container-fluid">
                <h2 class="text-center">
                    Your Albums
                </h2>
                <ul class="bxslider">
                    <li><img src="{{asset('img/backgrounds/nice-wallpaper.jpg')}}" /></li>
                    <li><img src="{{asset('img/backgrounds/nice-wallpaper.jpg')}}" /></li>
                    <li><img src="{{asset('img/backgrounds/nice-wallpaper.jpg')}}" /></li>
                    <li><img src="{{asset('img/backgrounds/nice-wallpaper.jpg')}}" /></li>
                    <li><img src="{{asset('img/backgrounds/nice-wallpaper.jpg')}}" /></li>
                </ul>
                <div class="row album">
                    @foreach($albums as $album)
                        <div class="col-md-12 center">
                            <h3>{{$album->album_name}}
                                <span class="right">
                                    <a href="{{url('addImage/'.$album->album_name)}}" data-toggle="modal" data-target=".upload-image" rel="tooltip" title="Add Image" class="add_image text-primary" ><i class="fa fa-plus"></i></a>
                                    <a href="{{url('delete/album/'.$album->album_name)}}" rel="tooltip" title="Delete Album" class="delete_album" style="color: #d62c1a"><i class="fa fa-trash"></i></a>
                                </span>
                            </h3>
                        </div><div class="col-md-12">
                        <ul class="bxslider bx-loading">
                        @for($x=1;$x<=$album->imageCount;$x++)
                            <li>
                                <div class="view" style="margin-top: 0;">

                                        {!! Html::image('/images/'.$user->id.'/albums/'.$album->album_name.'/'.$x.'.jpg','alt',['class'=>'album-img']) !!}
                                        <div class="caption2">
                                            <p><a href="#" data-toggle="modal" data-target=".modal-image"><span class="fa fa-search fa-2x"> </span> Click to view</a></p>
                                        </div>
                                </div>
                                <div class="stats turqbg">
                                    <p>
                                        <a href="{{url('delete/image/'.$album->album_name.'/'.$x)}}" class="btn btn-danger btn-xs" >Delete</a>
                                    </p>
                                </div>
                            </li>
                        @endfor
                            </ul></div>
                        <div class="col-md-12">
                            <hr style="border:1px solid #2c2c2c;;">
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="view">
                            <div class="caption2">
                                <p>47LabsDesign</p>
                                <a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
                                <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                            </div>
                            <img src="http://24.media.tumblr.com/273167b30c7af4437dcf14ed894b0768/tumblr_n5waxesawa1st5lhmo1_1280.jpg" class="img-responsive">
                        </div>
                        <div class="info">
                            <p class="small" style="text-overflow: ellipsis">An Awesome Title</p>
                            <p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted Today | 10:42 A.M.</small>
                        </div>
                        <div class="stats turqbg">
                            <span class="fa fa-heart-o"> <strong>47</strong></span>
                            <span class="fa fa-eye pull-right"> <strong>137</strong></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="view">
                            <div class="caption2">
                                <p>47LabsDesign</p>
                                <a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
                                <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                            </div>
                            <img src="http://24.media.tumblr.com/282fadab7d782edce9debf3872c00ef1/tumblr_n3tswomqPS1st5lhmo1_1280.jpg" class="img-responsive">
                        </div>
                        <div class="info">
                            <p class="small" style="text-overflow: ellipsis">An Awesome Title</p>
                            <p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted Today | 10:42 A.M.</small>
                        </div>
                        <div class="stats turqbg">
                            <span class="fa fa-heart-o"> <strong>47</strong></span>
                            <span class="fa fa-eye pull-right"> <strong>137</strong></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-menu-content">
                <h2 class="text-center">
                    Create Albums
                </h2>
                <center><i class="fa fa-cloud-upload fa-4x"></i></center>
                <div class="container-fluid user-content">
                    <div class="row">
                        <div class="col-md-12 center">
                            <h3>Create new album</h3>
                        </div>
                        <div class="col-md-12">
                            {!! Form::open(['url'=>'create/album','files'=>'true','class'=>'form-horizontal']) !!}
                            <div class="form-group {{$errors->has('album_name')? ' has-error' : ''}}">
                                <div class="col-md-12">
                                    {!! Form::text('album_name',null,['placeholder'=>'album name','class'=>'form-control','required'=>'true']) !!}
                                    @if ($errors->has('album_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('album_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('file')?'has-error':''}}">
                                <div class="col-md-12">
                                    {!! Form::file('images[]',['required'=>'true','data-placeholder'=>'Select one or more files','multiple'=>true,'class'=>'filestyle','data-badge'=>'true','data-buttonText'=>' Browse files','data-buttonName'=>'btn-primary']) !!}
                                </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    {!! Form::submit('Create',['class'=>' btn btn-success']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="share-links">
                    <center><button type="button" class="btn btn-lg btn-labeled btn-success" href="#" style="margin-bottom: 15px;">
                            <span class="btn-label"><i class="fa fa-bell-o"></i></span>A FINISHED PROJECT
                        </button></center>
                    <center><button type="button" class="btn btn-lg btn-labeled btn-warning" href="#">
                            <span class="btn-label"><i class="fa fa-bell-o"></i></span>A WORK IN PROGRESS
                        </button></center>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade upload-image" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title center" id="myLargeModalLabel-1" style="color:;">Add Images</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=>'','class'=>'form-horizontal','files'=>'true']) !!}
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::file('addImages[]',['required'=>'true','data-placeholder'=>'Select one or more files','multiple'=>true,'class'=>'filestyle form-control','data-iconName'=>'fa fa-plus','data-buttonText'=>' Add Images','data-buttonName'=>'btn-primary']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning"> Upload</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-image" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title center" id="myLargeModalLabel-1" style="color:;">Image View</h4>
            </div>
            <div class="modal-body">
                <div class="thumbnail">
                    {!! Html::image('','modal-image',['id'=>'modalImg','class'=>'img-responsive']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $( '.delete_album').click(function (event) {
        event.preventDefault();
       var url=$(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then(function () {
           window.location=url;
            swal(
                    'Deleted!',
                    'Your album has been deleted.',
                    'success'
            );
        });
    });
    $('.add_image').click(function () {
        var action=$(this).attr('href');
        $('.form-horizontal').attr('action',action);
    });
$(".caption2").click(function(){
    var src=$(this).parent().children('img').attr('src');
    $("#modalImg").attr("src",src);
});
$(".album-img").click(function(){
    $("#modalImg").attr("src",$(this).attr('src'));
})
</script>
@include('partials.upload_avatar')
@endsection