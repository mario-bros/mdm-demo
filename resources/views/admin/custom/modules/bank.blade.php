<div class="row">
    <div class="col-sm-2 "><h4 class="pull-right">Bank</h4></div>
    <div class="col-sm-8"></div>
</div>
<hr style="margin-top: 0px;">

@foreach ($getBank as $key => $getBankAccount)
<div class="form-group">
    <label for="nama_bank" class="col-sm-2 control-label">Nama Bank</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getBankAccount->namaBank->name ?? '' }}" class="form-control nama_bank" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="cabang" class="col-sm-2 control-label">Cabang Bank</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ (new \App\Helpers\Helper)->pob($getBankAccount->cabang) }}" class="form-control cabang" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="nomor_rekening" class="col-sm-2 control-label">Nomor Rekening</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getBankAccount->nomor_rekening ?? '' }}" class="form-control nomor_rekening" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="atas_nama" class="col-sm-2 control-label">Atas Nama</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getBankAccount->atas_nama ?? '' }}" class="form-control atas_nama" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="status_keaktifan_id" class="col-sm-2 control-label">Status Keaktifan</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getBankAccount->statusKeaktifanID->lookup_name ?? '' }}" class="form-control status_keaktifan_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="status_data" class="col-sm-2 control-label">Status Data</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getBankAccount->statusData->lookup_name ?? '' }}" class="form-control status_data" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-8">
        <div class="pull-right">Bank {{ $key }} of {{ $countBank }} entries.</div>
    </div>
</div>
<hr>
@endforeach

