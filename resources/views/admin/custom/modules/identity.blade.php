<div class="row">
    <div class="col-sm-2 "><h4 class="pull-right">Identity</h4></div>
    <div class="col-sm-8"></div>
</div>
<hr style="margin-top: 0px;">

@foreach ($getIdent as $key => $getIdentity)
<div class="form-group">
    <label for="category_identity_id" class="col-sm-2 control-label">Identitas</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getIdentity->categoryIdentityID->lookup_name ?? '' }}" class="form-control category_identity_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="nomor_identity" class="col-sm-2 control-label">Nomor Identitas</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getIdentity->nomor_identity ?? '' }}" class="form-control nomor_identity" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="masa_berlaku" class="col-sm-2 control-label">Masa Berlaku</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
            <input type="text" value="{{ $getIdentity->masa_berlaku ?? '' }}" class="form-control masa_berlaku" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="status_data" class="col-sm-2 control-label">Status Data</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getIdentity->statusData->lookup_name ?? '' }}" class="form-control status_data" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Deskripsi</label>
    <div class="col-sm-8">
    <textarea class="form-control identity description" rows="10" readonly>{{ $getIdentity->description ?? '' }}</textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-8">
        <div class="pull-right">Identity {{ $key }} of {{ $countIdent }} entries.</div>
    </div>
</div>
<hr>
@endforeach
