<div class="row">
    <div class="col-sm-2 "><h4 class="pull-right">Address</h4></div>
    <div class="col-sm-8"></div>
</div>
<hr style="margin-top: 0px;">

@foreach ($getAdd as $key => $getAddress)

<div class="form-group">
    <label for="address" class="col-sm-2 asterisk control-label">Alamat</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-address-book fa-fw"></i></span>
            <input type="text" value="{{ $getAddress->address ?? '' }}" class="form-control address" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="nomor" class="col-sm-2 control-label">Nomor Rumah</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getAddress->nomor ?? '' }}" class="form-control nomor" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="rt" class="col-sm-2 control-label">RT</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getAddress->rt ?? '' }}" class="form-control rt" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="rw" class="col-sm-2 control-label">RW</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getAddress->rw ?? '' }}" class="form-control rw" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="propinsi_id" class="col-sm-2 control-label">Provinsi</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{-- $getAddress->provinsiID->name ?? '' --}}" class="form-control propinsi_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="kota_id" class="col-sm-2 control-label">Kota</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{-- $getAddress->kotaID->name ?? '' --}}" class="form-control kota_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="kecamatan_id" class="col-sm-2 control-label">Kecamatan</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{-- $getAddress->kecamatanID->name ?? '' --}}" class="form-control kecamatan_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="kelurahan_id" class="col-sm-2 control-label">Kelurahan</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{-- $getAddress->kelurahanID->name ?? '' --}}" class="form-control kelurahan_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="category_tempat_tinggal_id" class="col-sm-2 control-label">Kategori Tempat Tinggal</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getAddress->categoryTempatTinggalID->lookup_name ?? '' }}" class="form-control category_tempat_tinggal_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="status_keaktifan_id" class="col-sm-2 control-label">Status Keaktifan</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getAddress->statusKeaktifanID->lookup_name ?? '' }}" class="form-control status_keaktifan_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="status_data" class="col-sm-2 control-label">Status Data</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getAddress->statusData->lookup_name ?? '' }}" class="form-control status_data" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="kodepos" class="col-sm-2 control-label">Kode Pos</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getAddress->kodepos ?? '' }}" class="form-control kodepos" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="longitude" class="col-sm-2 control-label">Longitude</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getAddress->longitude ?? '' }}" class="form-control longitude" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="latitude" class="col-sm-2 control-label">Latitude</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getAddress->latitude ?? '' }}" class="form-control latitude" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="status_tempat_tinggal_id" class="col-sm-2 control-label">Status Tempat Tinggal</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-address-book fa-fw"></i></span>
            <input type="text" value="{{ $getAddress->statusTempatTinggalID->lookup_name ?? '' }}" class="form-control status_tempat_tinggal_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="type_tempat_tinggal_id" class="col-sm-2 control-label">Tipe Tempat Tinggal</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-address-book fa-fw"></i></span>
            <input type="text" value="{{ $getAddress->typeTempatTinggalID->lookup_name ?? '' }}" class="form-control type_tempat_tinggal_id" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-8">
        <div class="pull-right">Address {{ $key }} of {{ $countAdd }} entries.</div>
    </div>
</div>
<hr>
@endforeach

