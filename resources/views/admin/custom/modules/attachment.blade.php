<div class="row">
    <div class="col-sm-2 "><h4 class="pull-right">Attachment</h4></div>
    <div class="col-sm-8"></div>
</div>
<hr style="margin-top: 0px;">

@foreach ($getAttach as $key => $getAttachment)
@if(Request::segment(2) == 'compare')
<div class="form-group  ">
    <label for="filename" class="col-sm-2  control-label">Filename</label>
    <div class="col-sm-8">
        <input type="file" class="attachment filename" name="attachment[2][filename]" data-initial-preview="{{url('uploads/'.$getAttachment['filename'])}}" data-initial-caption="{{substr($getAttachment['filename'],6)}}" />
    </div>
</div>  
@endif
<div class="form-group">
    <label for="type_file_id" class="col-sm-2 control-label">Type File</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getAttachment->typeFileID->lookup_name ?? '' }}" class="form-control type_file_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Deskripsi</label>
    <div class="col-sm-8">
        <textarea class="form-control identity description" rows="10" readonly>{{ $getAttachment->description ?? '' }}</textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-8">
        <div class="pull-right">Attachment {{ $key }} of {{ $countAttachment }} entries.</div>
    </div>
</div>
<hr>
@endforeach
