<div class="row">
    <div class="col-sm-2 "><h4 class="pull-right">Unit</h4></div>
    <div class="col-sm-8"></div>
</div>
<hr style="margin-top: 0px;">

@foreach ($getUnit as $key => $getUnitMNC)
<div class="form-group">
    <label for="unit_id" class="col-sm-2 control-label">Unit</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getUnitMNC->unitID->lookup_name ?? '' }}" class="form-control unit_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="status_keaktifan_id" class="col-sm-2 control-label">Status Keaktifan</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getUnitMNC->statusKeaktifanID->lookup_name ?? '' }}" class="form-control status_keaktifan_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="url_profile" class="col-sm-2 control-label">Profile URL</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-internet-explorer fa-fw"></i></span>
            <input type="text" value="{{ $getUnitMNC->url_profile ?? '' }}" class="form-control url_profile" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-8">
        <div class="pull-right">Unit {{ $key }} of {{ $countUnit }} entries.</div>
    </div>
</div>
<hr>
@endforeach
