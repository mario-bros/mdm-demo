<div class="row">
    <div class="col-sm-2 "><h4 class="pull-right">Contact</h4></div>
    <div class="col-sm-8"></div>
</div>
<hr style="margin-top: 0px;">

@foreach ($getCont as $key => $getContact)
<div class="form-group">
    <label for="contact_value" class="col-sm-2 control-label">Contact Value</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getContact->contact_value ?? '' }}" class="form-control contact_value" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="type_contact_id" class="col-sm-2 control-label">Tipe Kontak</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getContact->tipeKontak->lookup_name ?? '' }}" class="form-control type_contact_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="status_keaktifan_id" class="col-sm-2 control-label">Status Keaktifan</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getContact->statusKeaktifanID->lookup_name ?? '' }}" class="form-control status_keaktifan_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-8">
        <div class="pull-right">Contact {{ $key }} of {{ $countCont }} entries.</div>
    </div>
</div>
<hr>
@endforeach
