<div class="row">
    @if(Request::segment(2) == 'compare')
        <input type="file" class="foto" name="foto" data-initial-preview="{{url('uploads/'.$profile['foto'])}}" data-initial-caption="mdm.png" readonly>
    @endif
    <div class="col-md-6">
        <div class=" ">
            <label for="customer_id" class=" control-label">Customer ID</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->customer_id ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="full_name" class=" control-label">Nama Lengkap</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->full_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="first_name" class=" control-label">Nama Depan</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->first_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="middle_name" class=" control-label">Nama Tengah</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->middle_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="last_name" class=" control-label">Nama Belakang</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->last_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="surname" class=" control-label">Nama Panggilan</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->surname ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="dob" class=" control-label">Tanggal Lahir</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                    <input type="text" value="{{ $profile->dob ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="pob" class=" control-label">Tempat Lahir</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->pob }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="status_kawin_id" class=" control-label">Status Kawin</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->statusKawinID->lookup_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="mortalitas_id" class=" control-label">Mortalitas</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->mortalitasID->lookup_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-8">
        <fieldset></fieldset>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class=" ">
            <label for="email" class=" control-label">Email</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                    <input type="text" value="{{ $profile->email ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="category_user_id" class=" control-label">Kategori Pengguna</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->CategoryUser->lookup_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="gender" class=" control-label">Jenis Kelamin</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->genderID->lookup_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="kewarganegaraan_id" class=" control-label">Kewarganegaraan</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->kewarganegaraanID->lookup_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="negara_id" class=" control-label">Negara</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->negaraID->lookup_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="religion_id" class=" control-label">Agama</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->agamaID->lookup_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="suku_id" class=" control-label">Suku</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->sukuID->lookup_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="pendidikan_id" class=" control-label">Pendidikan</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->pendidikanID->lookup_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="profesi_id" class=" control-label">Profesi</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->profesiID->lookup_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" ">
            <label for="golongan_darah_id" class=" control-label">Golongan Darah</label>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" value="{{ $profile->golonganDarahID->lookup_name ?? '' }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
