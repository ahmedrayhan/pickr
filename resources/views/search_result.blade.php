@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-bottom: 20px;">
    <div class="col-md-3 col-xs-10 sort_block_min">
        <div class="col-md-12 col-xs-11">
            <h4 class="center">Find</h4>
            <hr>
            {!! Form::open(['url'=>'/search','class'=>'form-horizontal','id'=>'sortForm']) !!}
            <div class="form-group">
            <div class="col-md-12">
                {!!Form::select('category', ['corporate' => 'Corporate','family' => 'Family','advetisement' => 'Advertisement','product' => 'Product','wedding' => 'Wedding', 'fashion' => 'Fashion'], null, ['id'=>'formCat','class'=>'form-control','placeholder' => 'Pick a category...'])!!}
            </div>
        </div>
            <div class="form-group">
            <div class="col-md-12">
                <h5 class="center">Sort</h5>
                <hr>
                {!!Form::select('sort', ['name' => 'Name','rating' => 'Rating','job_fee' => 'Job Fee'], null, ['id'=>'formSort','class'=>'form-control','placeholder' => 'Sort by...'])!!}
            </div>
        </div>
            <div class="form-group">
            <div class="col-md-12">
                {!! Form::submit('Sort',['class'=>'form-control btn btn-info']) !!}
            </div>
        </div>
            {!! Form::close() !!}
        </div>
        <div class="col-xs-1 no-pad">
            <div class="arrow-right"></div>
        </div>
    </div>
    <div class="col-md-9 container-fluid">
        <div id="loader"></div>
        <div id="search_result">
            @include('partials.search_result')
        </div>
    </div>
</div>
    <script>
        $( document).ready(function () {
            $( '#sortForm').submit(function (e) {
              e.preventDefault();
                var url=$( '#sortForm').attr('action');
                var formData=$( '#sortForm').serialize();
                console.log(formData);
                $.ajax({
                    type:'POST',
                    url:url,
                    data:formData,
                    dataType:'html',
                    beforeSend:function () {
                        $( '#loader').css('display','block');
                        $('#loader').html('<center><i class="fa fa-spinner fa-spin fa-5x fa-fw"></center>');
                    },
                    success:function (data) {
                        $('#search_result').html(data).fadeIn(500);
                        $( '#loader').css('display','none').fadeOut();
                        $(".prof_rate").rating({
                            step:0.2,
                            size:11,
                            showClear:false,
                            readonly:true,
                            showCaption:true
                        });
                    }
                })
            });
        });
    </script>
@endsection