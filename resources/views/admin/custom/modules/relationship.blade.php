<div class="row">
    <div class="col-sm-2 "><h4 class="pull-right">Relationship</h4></div>
    <div class="col-sm-8"></div>
</div>
<hr style="margin-top: 0px;">

@foreach ($getRelat as $key => $getRelationship)
<div class="form-group">
    <label for="first_name" class="col-sm-2 control-label">Nama Depan</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->first_name ?? '' }}" class="form-control first_name" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="last_name" class="col-sm-2 control-label">Nama Belakang</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->last_name ?? '' }}" class="form-control last_name" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="dob" class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->dob ?? '' }}" class="form-control dob" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="pob" class="col-sm-2 control-label">Tempat Lahir</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->pob }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="address" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-address-book fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->address ?? '' }}" class="form-control address" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="mobile_phone" class="col-sm-2 control-label">Mobile Phone</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->mobile_phone ?? '' }}" class="form-control mobile_phone" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="telephone" class="col-sm-2 control-label">Telephone</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->telephone ?? '' }}" class="form-control telephone" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->email ?? '' }}" class="form-control email" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="gender" class="col-sm-2 control-label">Jenis Kelamin</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->genderID->lookup_name ?? '' }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="religion_id" class="col-sm-2 control-label">Agama</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->agamaID->lookup_name ?? '' }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="profesi_id" class="col-sm-2 control-label">Profesi</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->profesiID->lookup_name ?? '' }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="status_kawin_id" class="col-sm-2 control-label">Status Kawin</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->statusKawinID->lookup_name ?? '' }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="relationship_id" class="col-sm-2 control-label">Hubungan Keluarga</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->hubunganKeluargaID->lookup_name ?? '' }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="category_identity_id" class="col-sm-2 control-label">Identitas</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->identitasID->lookup_name ?? '' }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="nomor_identity" class="col-sm-2 control-label">Nomor Identitas</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->nomor_identity ?? '' }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="masa_berlaku" class="col-sm-2 control-label">Masa Berlaku</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->masa_berlaku ?? '' }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="status_data" class="col-sm-2 control-label">Status Data</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
            <input type="text" value="{{ $getRelationship->statusData->lookup_name ?? '' }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-8">
        <div class="pull-right">Relationship {{ $key }} of {{ $countRelationship }} entries.</div>
    </div>
</div>
<hr>
@endforeach
