<div class="modal fade upload_avatar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title" id="myLargeModalLabel-1" style="color:;">Upload Photo</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'uploadForm','url'=>'/uploadAvatar','role'=>'form','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::file('image',['class'=>'filestyle','data-input'=>'ture']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <hr>
                <div class="upload-profile-image">
                    @if($images !='')
                        @foreach($images as $image)
                            {{Html::image('/images/'.$user->id.'/avatars/'.$image->getRelativePathName(),$image->getRelativePathName()
                            ,['class'=>'thumbnail'])}}
                        @endforeach
                     @endif
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" form="uploadForm" value="Save">
            </div>
        </div>
    </div>
</div>