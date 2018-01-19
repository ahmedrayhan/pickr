<div class="row center">
    <h3>Photographer for {{$type}}</h3>
    <hr>
</div>
@foreach($users as $user)
    <div class="col-md-4">
        <div class="thumbnail">
            <img src="{{asset('images/avatars/'.$user->id.'/avatar.jpg')}}" class="img-responsive err-img">
            <div class="caption">
                <input class="prof_rate" name="prof_rate" value="{{$user->rating}}" class="rating-loading">
                <small>Job Fee : </small><span class="label label-primary">৳ {{$user->job_fee}}</span>
                <h4>{{$user->name}}</h4>
                <p><a href="{{url('/view_profile/'.$user->id)}}" class="btn btn-success btn-sm">View</a>
                    <a href="{{url('/view_profile/'.$user->id.'/hire')}}" class="btn btn-warning btn-sm">Hire now</a></p>
            </div>
        </div>
    </div>
@endforeach