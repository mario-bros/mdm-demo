<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MNC Digital MDM Integration</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    

    <link rel="stylesheet" href="/vendor/laravel-admin/laravel-admin.min.css?id=3e878e8f46694ed2465296c80c3049b0">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
    <link type="text/css" rel="stylesheet" href="/vendor/laravel-admin/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/css/custom.css">

    <script src="/vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="skin-yellow sidebar-mini sidebar-collapse nimbus-is-editor">
    <div class="navbar navbar-default navbar-fixed-top ">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/help/integration">MDM API</a>
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#topNavigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="topNavigation">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="/api/help/integration/usage/clientside" class="dropdown">Customer Input Geneator Page</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wrapper">

        <div class="content-wrapper" id="pjax-container" style="min-height: 800px;">

            <div id="app">
                
                <section class="content-header">
                    <h1><a href="">Client-side Sample App</a></h1>
                    <br/>

                    <h3>Generate Payload Body</h3>
                    <p>Here is the simple page that show how to fill each criteria value </p>

                </section>

                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add Customer Entity To MDM</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form action="{{ route('form-test-input.store') }}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
                                    @csrf

                                    @isset($successMessage)
                                        <div class="col-md-12">
                                            <div class="alert-success">
                                                <span style="color:black; font-size: bold">{{ $successMessage }}</span>
                                            </div>
                                        </div>
                                    @endisset

                                    <div class="box-body">

                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab-form-1" data-toggle="tab" aria-expanded="true">
                                                        Profile <i class="fa fa-exclamation-circle text-red hide"></i>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab-form-2" data-toggle="tab" aria-expanded="false">
                                                        Address <i class="fa fa-exclamation-circle text-red hide"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab-form-3" data-toggle="tab">
                                                        Contact <i class="fa fa-exclamation-circle text-red hide"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab-form-4" data-toggle="tab">
                                                        Identity <i class="fa fa-exclamation-circle text-red hide"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab-form-5" data-toggle="tab">
                                                        Bank Account <i class="fa fa-exclamation-circle text-red hide"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab-form-6" data-toggle="tab">
                                                    Unit <i class="fa fa-exclamation-circle text-red hide"></i>
                                                </a>
                                                </li>
                                                <!-- <li>
                                                    <a href="#tab-form-8" data-toggle="tab">
                                                        Relationship <i class="fa fa-exclamation-circle text-red hide"></i>
                                                    </a>
                                                </li> -->

                                            </ul>
                                            <div class="tab-content fields-group">

                                                <div class="tab-pane active" id="tab-form-1">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="control-label">Customer ID</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                                <input type="text" name="customer_id" value="{{ old('customer_id') }}" class="form-control" placeholder="Input Customer ID">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="asterisk control-label">Nama Lengkap</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                                <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="Input Nama Lengkap">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="asterisk control-label">Nama Depan</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                                <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="Input Nama Depan">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="control-label">Nama Tengah</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                                <input type="text" name="middle_name" value="{{ old('middle_name') }}" class="form-control" placeholder="Input Nama Tengah">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="control-label">Nama Belakang</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                                <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Input Nama Belakang">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="control-label">Nama Marga</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                                <input type="text" name="surname" value="{{ old('surname') }}" class="form-control" placeholder="Input Nama Belakang">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Nama Panggilan</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                                <input type="text" name="nickname" value="{{ old('nickname') }}" class="form-control surname" placeholder="Input Nama Panggilan">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Gender</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                                <select class="form-control" name="gender" style="width: 100%">
                                                                    @foreach( \App\Model\Lookups::where('category', strtoupper('gender'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                        <option value="{{$select}}" {{ $select == old('gender')  ? 'selected' : '' }}>{{$option}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="asterisk control-label">Tanggal Lahir</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                                                <input style="width: 100" type="text" name="dob" value="{{ old('dob') }}" class="form-control" placeholder="Input Tanggal Lahir">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Tempat Lahir</label>
                                                            <select class="form-control" name="pob" style="width: 100%">
                                                                @foreach( \App\Model\Lookups\MDMCity::pluck('name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('pob')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Suku</label>
                                                            <select class="form-control" name="suku" style="width: 100%">
                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('suku'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('suku')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Kewarganegaraan</label>
                                                            <select class="form-control" name="kewarganegaraan" style="width: 100%">
                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('kewarganegaraan'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('kewarganegaraan')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Negara</label>
                                                            <select class="form-control" name="negara" style="width: 100%">
                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('negara'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('negara')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Agama</label>
                                                            <select class="form-control" name="religion" style="width: 100%">
                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('agama'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('religion')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Pendidikan</label>
                                                            <select class="form-control" name="pendidikan" style="width: 100%">
                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('pendidikan'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('pendidikan')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Profesi</label>
                                                            <select class="form-control" name="profesi" style="width: 100%;">
                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('profesi'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('profesi')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Golongan Darah</label>
                                                            <select class="form-control" name="golongan_darah" style="width: 100%;">
                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('golongan darah'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('golongan_darah')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Status Kawin</label>
                                                            <select class="form-control" name="status_kawin" style="width: 100%">
                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('status kawin'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('status_kawin')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Mortalitas</label>
                                                            <select class="form-control" name="mortalitas" style="width: 100%">
                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('mortalitas'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('mortalitas')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Status Keaktifan</label>
                                                            <select class="form-control" name="status_keaktifan" style="width: 100%">
                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('status keaktifan'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('status_keaktifan')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Status Pengkinian Data</label>
                                                            <select class="form-control" name="status_pengkinian_data" style="width: 100%">
                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('status pengkinian data'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('status_pengkinian_data')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" control-label">Kategori User</label>
                                                            <select class="form-control" name="category_user" style="width: 100%">
                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('category user'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                    <option value="{{$select}}" {{ $select == old('category_user')  ? 'selected' : '' }}>{{$option}}</option>
                                                                @endforeach
                                                            </select>
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
                                                            <label class=" control-label">Email</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                                <input type="text" name="email" value="{{ old('Email') }}" class="form-control" placeholder="Email">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="tab-form-2">
                                                    <div class="row">
                                                        <div class="col-sm-2 ">
                                                            <h4 class="pull-right">Address</h4></div>
                                                        <div class="col-sm-8"></div>
                                                    </div>

                                                    <hr style="margin-top: 0px;">

                                                    <div id="has-many-address" class="has-many-address">
                                                        <div class="has-many-address-forms"></div>

                                                        <template class="address-tpl">
                                                            <div class="has-many-address-form fields-group">
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2 asterisk control-label">Alamat</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-address-book fa-fw"></i></span>
                                                                            <input type="text" name="address[__LA_KEY__][address]" value="" class="form-control address address" placeholder="Input Alamat">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Nomor Rumah</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
                                                                            <input type="text" name="address[__LA_KEY__][nomor]" value="" class="form-control address nomor" placeholder="Input Nomor Rumah">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Blok</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
                                                                            <input type="text" name="address[__LA_KEY__][blok]" value="" class="form-control address blok" placeholder="Input Blok Rumah">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2 control-label">RT</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
                                                                            <input type="text" name="address[__LA_KEY__][rt]" value="" class="form-control address rt" placeholder="Input RT">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">RW</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
                                                                            <input type="text" name="address[__LA_KEY__][rw]" value="" class="form-control address rw" placeholder="Input RW">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Provinsi</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control address propinsi" name="address[__LA_KEY__][propinsi]" data-value="" style="width: 100%">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups\MDMProvince::pluck('name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}" >{{$option}}</option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Kota</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control address kota" name="address[__LA_KEY__][kota]" data-value="" style="width: 100%">
                                                                            <option value=""></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="col-sm-2  control-label">Kecamatan</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control address kecamatan" name="address[__LA_KEY__][kecamatan]" data-value="" style="width: 100%">
                                                                            <option value=""></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Kelurahan</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control address kelurahan" name="address[__LA_KEY__][kelurahan]" data-value="" style="width: 100%">
                                                                            <option value=""></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Kode Pos</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
                                                                            <input type="text" name="address[__LA_KEY__][kodepos]" value="" class="form-control address kodepos" placeholder="Input Kode Pos">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Longitude</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
                                                                            <input type="text" name="address[__LA_KEY__][longitude]" value="" class="form-control address longitude" placeholder="Input Longitude">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Latitude</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
                                                                            <input type="text" name="address[__LA_KEY__][latitude]" value="" class="form-control address latitude" placeholder="Input Latitude">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Status Tempat Tinggal</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control address status_tempat_tinggal" style="width: 100%;" name="address[__LA_KEY__][status_tempat_tinggal]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('status tempat tinggal'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Tipe Tempat Tinggal</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control address type_tempat_tinggal" style="width: 100%;" name="address[__LA_KEY__][type_tempat_tinggal]" data-value="">
                                                                            <option value=""></option>
                                                                                @foreach( \App\Model\Lookups::where('category', strtoupper('type tempat tinggal'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                    <option value="{{$select}}">{{$option}}</option>
                                                                                @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Kategori Tempat Tinggal</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control address category_tempat_tinggal" style="width: 100%;" name="address[__LA_KEY__][category_tempat_tinggal]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('category tempat tinggal'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Status Keaktifan</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control address status_keaktifan" style="width: 100%;" name="address[__LA_KEY__][status_keaktifan]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('status keaktifan'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Status Data</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control address status_data" style="width: 100%;" name="address[__LA_KEY__][status_data]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('Status Verifikasi'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <label class="col-sm-2  control-label">Is Primary</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control address IsPrimary" style="width: 100%;" name="address[__LA_KEY__][IsPrimary]" data-value="">
                                                                            <option value="0">FALSE</option>
                                                                            <option value="1">TRUE</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="address[__LA_KEY__][id]" value="" class="address id">
                                                                <input type="hidden" name="address[__LA_KEY__][_remove_]" value="0" class="address _remove_ fom-removed">

                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label"></label>
                                                                    <div class="col-sm-8">
                                                                        <div class="remove btn btn-warning btn-sm pull-right"><i class="fa fa-trash"></i>&nbsp;Remove</div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </template>

                                                        <div class="form-group">
                                                            <label class="col-sm-2  control-label"></label>
                                                            <div class="col-sm-8">
                                                                <div class="add btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;New</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane " id="tab-form-3">
                                                    <div class="row">
                                                        <div class="col-sm-2 ">
                                                            <h4 class="pull-right">Contact</h4></div>
                                                        <div class="col-sm-8"></div>
                                                    </div>

                                                    <hr style="margin-top: 0px;">

                                                    <div id="has-many-contact" class="has-many-contact">
                                                        <div class="has-many-contact-forms"></div>

                                                        <template class="contact-tpl">
                                                            <div class="has-many-contact-form fields-group">
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2 asterisk control-label">Contact Value</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
                                                                            <input type="text" name="contact[__LA_KEY__][contact_value]" value="" class="form-control contact contact_value" placeholder="Input Contact Value">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2 asterisk control-label">Tipe Kontak</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control contact type_contact" style="width: 100%;" name="contact[__LA_KEY__][type_contact]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('type contact'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Status Keaktifan</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control contact status_keaktifan" style="width: 100%;" name="contact[__LA_KEY__][status_keaktifan]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('status keaktifan'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Status Verifikasi</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control contact status_verifikasi" style="width: 100%;" name="contact[__LA_KEY__][status_verifikasi]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('status verifikasi'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Waktu Verifikasi</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                                                            <input type="text" name="contact[__LA_KEY__][verified_at]" class="form-control contact verified_at" placeholder="Input Waktu Verifikasi">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Status Data</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control contact status_data" style="width: 100%;" name="contact[__LA_KEY__][status_data]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('Status Verifikasi'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <label class="col-sm-2  control-label">Is Primary</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control contact IsPrimary" style="width: 100%;" name="contact[__LA_KEY__][IsPrimary]" data-value="">
                                                                            <option value="0">FALSE</option>
                                                                            <option value="1">TRUE</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="contact[__LA_KEY__][id]" value="" class="contact id">
                                                                <input type="hidden" name="contact[__LA_KEY__][_remove_]" value="0" class="contact _remove_ fom-removed">

                                                                <div class="form-group">
                                                                    <label class="col-sm-2  control-label"></label>
                                                                    <div class="col-sm-8">
                                                                        <div class="remove btn btn-warning btn-sm pull-right"><i class="fa fa-trash"></i>&nbsp;Remove</div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </template>

                                                        <div class="form-group">
                                                            <label class="col-sm-2  control-label"></label>
                                                            <div class="col-sm-8">
                                                                <div class="add btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;New</div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tab-pane " id="tab-form-4">
                                                    <div class="row">
                                                        <div class="col-sm-2 ">
                                                            <h4 class="pull-right">Identity</h4></div>
                                                        <div class="col-sm-8"></div>
                                                    </div>

                                                    <hr style="margin-top: 0px;">

                                                    <div id="has-many-identity" class="has-many-identity">
                                                        <div class="has-many-identity-forms"></div>

                                                        <template class="identity-tpl">
                                                            <div class="has-many-identity-form fields-group">
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2 asterisk control-label">Identitas</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control identity category_identity" style="width: 100%;" name="identity[__LA_KEY__][category_identity]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('category identity'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2 asterisk control-label">Nomor Identitas</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
                                                                            <input type="text" name="identity[__LA_KEY__][nomor_identity]" value="" class="form-control identity nomor_identity" placeholder="Input Nomor Identitas">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Masa Berlaku</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                                                            <input style="width: 100" type="text" name="identity[__LA_KEY__][masa_berlaku]" value="" class="form-control identity masa_berlaku" placeholder="Input Masa Berlaku">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Status Data</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control identity status_data" style="width: 100%;" name="identity[__LA_KEY__][status_data]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('status verifikasi'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group  ">
                                                                    <label for="description" class="col-sm-2  control-label">Deskripsi</label>
                                                                    <div class="col-sm-8">
                                                                        <textarea name="identity[__LA_KEY__][description]" class="form-control identity description" rows="5" placeholder="Input Deskripsi"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Is Primary</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control identity IsPrimary" style="width: 100%;" name="identity[__LA_KEY__][IsPrimary]" data-value="">
                                                                            <option value="0">FALSE</option>
                                                                            <option value="1">TRUE</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="identity[__LA_KEY__][id]" value="" class="identity id">
                                                                <input type="hidden" name="identity[__LA_KEY__][_remove_]" value="0" class="identity _remove_ fom-removed">

                                                                <div class="form-group">
                                                                    <label class="col-sm-2  control-label"></label>
                                                                    <div class="col-sm-8">
                                                                        <div class="remove btn btn-warning btn-sm pull-right"><i class="fa fa-trash"></i>&nbsp;Remove</div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </template>

                                                        <div class="form-group">
                                                            <label class="col-sm-2  control-label"></label>
                                                            <div class="col-sm-8">
                                                                <div class="add btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;New</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="tab-form-5">
                                                    <div class="row">
                                                        <div class="col-sm-2 ">
                                                            <h4 class="pull-right">Bank</h4></div>
                                                        <div class="col-sm-8"></div>
                                                    </div>

                                                    <hr style="margin-top: 0px;">

                                                    <div id="has-many-bank" class="has-many-bank">
                                                        <div class="has-many-bank-forms"></div>

                                                        <template class="bank-tpl">
                                                            <div class="has-many-bank-form fields-group">
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2 asterisk control-label">Bank</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control bank nama_bank" style="width: 100%;" name="bank[__LA_KEY__][nama_bank]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups\MDMBank::pluck('name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2 asterisk control-label">Cabang Bank</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control bank cabang" style="width: 100%;" name="bank[__LA_KEY__][cabang]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups\MDMCity::pluck('name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2 asterisk control-label">Nomor Rekening</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
                                                                            <input type="text" name="bank[__LA_KEY__][nomor_rekening]" value="" class="form-control bank nomor_rekening" placeholder="Input Nomor Rekening">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2 asterisk control-label">Atas Nama</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                                                            <input type="text" name="bank[__LA_KEY__][atas_nama]" value="" class="form-control bank atas_nama" placeholder="Input Atas Nama">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Status Keaktifan</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control bank status_keaktifan" style="width: 100%;" name="bank[__LA_KEY__][status_keaktifan]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('status keaktifan'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Status Data</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control bank status_data" style="width: 100%;" name="bank[__LA_KEY__][status_data]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('Status Verifikasi'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Is Primary</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control bank IsPrimary" style="width: 100%;" name="bank[__LA_KEY__][IsPrimary]" data-value="">
                                                                            <option value="0">FALSE</option>
                                                                            <option value="1">TRUE</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="bank[__LA_KEY__][id]" value="" class="bank id">
                                                                <input type="hidden" name="bank[__LA_KEY__][_remove_]" value="0" class="bank _remove_ fom-removed">

                                                                <div class="form-group">
                                                                    <label class="col-sm-2  control-label"></label>
                                                                    <div class="col-sm-8">
                                                                        <div class="remove btn btn-warning btn-sm pull-right"><i class="fa fa-trash"></i>&nbsp;Remove</div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </template>

                                                        <div class="form-group">
                                                            <label class="col-sm-2  control-label"></label>
                                                            <div class="col-sm-8">
                                                                <div class="add btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;New</div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tab-pane " id="tab-form-6">
                                                    <div class="row">
                                                        <div class="col-sm-2 ">
                                                            <h4 class="pull-right">Unit</h4></div>
                                                        <div class="col-sm-8"></div>
                                                    </div>

                                                    <hr style="margin-top: 0px;">

                                                    <div id="has-many-unit" class="has-many-unit">
                                                        <div class="has-many-unit-forms"></div>

                                                        <template class="unit-tpl">
                                                            <div class="has-many-unit-form fields-group">
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2 asterisk control-label">Unit</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control unit unit" style="width: 100%;" name="unit[__LA_KEY__][unit]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('unit'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Status Keaktifan</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-control unit status_keaktifan" style="width: 100%;" name="unit[__LA_KEY__][status_keaktifan]" data-value="">
                                                                            <option value=""></option>
                                                                            @foreach( \App\Model\Lookups::where('category', strtoupper('status keaktifan'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                                                <option value="{{$select}}">{{$option}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2  control-label">Profile URL</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-internet-explorer fa-fw"></i></span>
                                                                            <input type="url" name="unit[__LA_KEY__][url_profile]" value="" class="form-control unit url_profile" placeholder="Input Profile URL">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group  ">
                                                                    <label class="col-sm-2 control-label">Customer Id</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="fa fa-free-code-camp fa-fw"></i></span>
                                                                            <input type="text" name="unit[__LA_KEY__][customer_id]" value="" class="form-control unit customer_id" placeholder="Input Customer Id">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="unit[__LA_KEY__][id]" value="" class="unit id">
                                                                <input type="hidden" name="unit[__LA_KEY__][_remove_]" value="0" class="unit _remove_ fom-removed">

                                                                <div class="form-group">
                                                                    <label class="col-sm-2  control-label"></label>
                                                                    <div class="col-sm-8">
                                                                        <div class="remove btn btn-warning btn-sm pull-right"><i class="fa fa-trash"></i>&nbsp;Remove</div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </template>

                                                        <div class="form-group">
                                                            <label class="col-sm-2  control-label"></label>
                                                            <div class="col-sm-8">
                                                                <div class="add btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;New</div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                
                                                

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">

                                        <div class="col-md-10">

                                            <div class="btn-group pull-left">
                                                <button class="btn btn-secondary" style="background-color:cadetblue; color:black;" type="submit" name="submit" value="generate">Generate payload request ( JSON format )</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.box-footer -->
                                </form>

                                
                                @isset($json_payload)
                                    <div class="info-box-content">
                                        <h4>Json Payload</h4>
                                        <pre class="prettyprint source lang-html">
<code>
    {!! $json_payload !!}
</code>
                                        </pre>
                                    </div>
                                @endisset
                                
                            </div>

                        </div>

                    </div>

                </section>
            </div>

            <script data-exec-on-popstate="">
                $(function() {
                    $("[name='gender'], " + 
                        "[name='pob'], " + 
                        "[name='suku'], " +
                        "[name='kewarganegaran'], " +
                        "[name='negara'], " + 
                        "[name='religion'], " + 
                        "[name='pendidikan'], " + 
                        "[name='profesi'], " + 
                        "[name='golongan_darah'], " +
                        "[name='status_kawin'], " +
                        "[name='mortalitas'], " +
                        "[name='status_keaktifan'], " +
                        "[name='status_pengkinian_data'], " +
                        "[name='category_user']").select2({"allowClear": true})

                    $("#screenfull-toggle").click(function() {
                        screenfull.toggle($("body")[0])
                    })

                    var hash = document.location.hash;
                    if (hash) {
                        $('.nav-tabs a[href="' + hash + '"]').tab('show');
                    }

                    // Change hash for page-reload
                    $('.nav-tabs a').on('shown.bs.tab', function(e) {
                        history.pushState(null, null, e.target.hash);
                    });

                    if ($('.has-error').length) {
                        $('.has-error').each(function() {
                            var tabId = '#' + $(this).closest('.tab-pane').attr('id');
                            $('li a[href="' + tabId + '"] i').removeClass('hide');
                        });

                        var first = $('.has-error:first').closest('.tab-pane').attr('id');
                        $('li a[href="#' + first + '"]').tab('show');
                    }

                    $("[name='dob']").datetimepicker({
                        format: 'YYYY-MM-DD',
                        locale: "en",
                        allowInputToggle: true
                    });


                    $(document).off('change', ".address.propinsi");
                    $(document).on('change', ".address.propinsi", function() {
                        var target = $(this).closest('.fields-group').find(".kota");

                        // $.ajaxSetup({
                        //     headers: {
                        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        //     }
                        // });

                        $.get("/api/ajax/get/cities/" + this.value, {
                        }, function(data) {
                            target.find("option").remove();
                            $(target).select2({
                                placeholder: {
                                    "id": "",
                                    "text": "Choose"
                                },
                                allowClear: true,
                                data: $.map(data, function(d) {
                                    d.id = d.id;
                                    d.text = d.text;
                                    return d;
                                })
                            }).trigger('change');
                        });
                    });

                    $(document).off('change', ".address.kota");
                    $(document).on('change', ".address.kota", function() {
                        var target = $(this).closest('.fields-group').find(".kecamatan");
                        
                        // $.ajaxSetup({
                        //     headers: {
                        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        //     }
                        // });

                        $.get("/api/ajax/get/districts/" + this.value, {
                        }, function(data) {
                            target.find("option").remove();
                            $(target).select2({
                                placeholder: {
                                    "id": "",
                                    "text": "Choose"
                                },
                                allowClear: true,
                                data: $.map(data, function(d) {
                                    d.id = d.id;
                                    d.text = d.text;
                                    return d;
                                })
                            }).trigger('change');
                        });
                    });

                    $(document).off('change', ".address.kecamatan");
                    $(document).on('change', ".address.kecamatan", function() {
                        var target = $(this).closest('.fields-group').find(".kelurahan");

                        // $.ajaxSetup({
                        //     headers: {
                        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        //     }
                        // });

                        $.get("/api/ajax/get/villages/" + this.value, {
                        }, function(data) {
                            target.find("option").remove();
                            $(target).select2({
                                placeholder: {
                                    "id": "",
                                    "text": "Choose"
                                },
                                allowClear: true,
                                data: $.map(data, function(d) {
                                    d.id = d.id;
                                    d.text = d.text;
                                    return d;
                                })
                            }).trigger('change');
                        });
                    });


                    $('#has-many-address').off('click', '.add').on('click', '.add', function() {

                        var tpl = $('template.address-tpl');

                        var index = 0;
                        index++;

                        var template = tpl.html().replace(/__LA_KEY__/g, index);
                        $('.has-many-address-forms').append(template);
                        $(".address.propinsi").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Provinsi"
                            }
                        });
                        $(".address.kota").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Kota"
                            }
                        });
                        $(".address.kecamatan").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Kecamatan"
                            }
                        });
                        $(".address.kelurahan").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Kelurahan"
                            }
                        });
                        $(".address.category_tempat_tinggal").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Kategori Tempat Tinggal"
                            }
                        });
                        $(".address.status_keaktifan").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Status Keaktifan"
                            }
                        });
                        $(".address.status_data").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Status Data"
                            }
                        });
                        $(".address.status_tempat_tinggal").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Status Tempat Tinggal"
                            }
                        });
                        $(".address.type_tempat_tinggal").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Tipe Tempat Tinggal"
                            }
                        });
                        return false;
                    });

                    $('#has-many-address').off('click', '.remove').on('click', '.remove', function() {
                        $(this).closest('.has-many-address-form').hide();
                        $(this).closest('.has-many-address-form').find('.fom-removed').val(1);
                        return false;
                    });


                    $('#has-many-contact').off('click', '.add').on('click', '.add', function() {

                        var tpl = $('template.contact-tpl');

                        var index = 0;
                        index++;

                        var template = tpl.html().replace(/__LA_KEY__/g, index);
                        $('.has-many-contact-forms').append(template);
                        $(".contact.type_contact").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Tipe Kontak"
                            }
                        });
                        $(".contact.status_keaktifan").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Status Keaktifan"
                            }
                        });
                        $(".contact.status_verifikasi").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Status Keaktifan"
                            }
                        });
                        $(".contact.verified_at").datetimepicker({
                            format: 'YYYY-MM-DD',
                            locale: "en",
                            allowInputToggle: true
                        });
                        $(".contact.status_data").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Status Data"
                            }
                        });

                        return false;
                    });

                    $('#has-many-contact').off('click', '.remove').on('click', '.remove', function() {
                        $(this).closest('.has-many-contact-form').hide();
                        $(this).closest('.has-many-contact-form').find('.fom-removed').val(1);
                        return false;
                    });


                    $('#has-many-identity').off('click', '.add').on('click', '.add', function() {

                        var tpl = $('template.identity-tpl');

                        var index = 0;
                        index++;

                        var template = tpl.html().replace(/__LA_KEY__/g, index);
                        $('.has-many-identity-forms').append(template);
                        $(".identity.category_identity").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Identitas"
                            }
                        });
                        $('.identity.masa_berlaku').parent().datetimepicker({
                            "format": "YYYY-MM-DD",
                            "locale": "en",
                            "allowInputToggle": true
                        });
                        $(".identity.status_data").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Status Data"
                            }
                        });
                        return false;
                    });

                    $('#has-many-identity').off('click', '.remove').on('click', '.remove', function() {
                        $(this).closest('.has-many-identity-form').hide();
                        $(this).closest('.has-many-identity-form').find('.fom-removed').val(1);
                        return false;
                    });


                    $('#has-many-bank').off('click', '.add').on('click', '.add', function() {

                        var tpl = $('template.bank-tpl');

                        var index = 0;
                        index++;

                        var template = tpl.html().replace(/__LA_KEY__/g, index);
                        $('.has-many-bank-forms').append(template);
                        $(".bank.nama_bank").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Bank"
                            }
                        });
                        $(".bank.cabang").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Cabang Bank"
                            }
                        });
                        $(".bank.status_keaktifan").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Status Keaktifan"
                            }
                        });
                        $(".bank.status_data").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Status Data"
                            }
                        });
                        return false;
                    });

                    $('#has-many-bank').off('click', '.remove').on('click', '.remove', function() {
                        $(this).closest('.has-many-bank-form').hide();
                        $(this).closest('.has-many-bank-form').find('.fom-removed').val(1);
                        return false;
                    });


                    $('#has-many-unit').off('click', '.add').on('click', '.add', function() {

                        var tpl = $('template.unit-tpl');

                        var index = 0;
                        index++;

                        var template = tpl.html().replace(/__LA_KEY__/g, index);
                        $('.has-many-unit-forms').append(template);

                        /*$(".unit.unit").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Unit"
                            }
                        });*/
                        $(".unit.status_keaktifan").select2({
                            "allowClear": true,
                            "placeholder": {
                                "id": "",
                                "text": "Status Keaktifan"
                            }
                        });
                        return false;
                    });

                    $('#has-many-unit').off('click', '.remove').on('click', '.remove', function() {
                        $(this).closest('.has-many-unit-form').hide();
                        $(this).closest('.has-many-unit-form').find('.fom-removed').val(1);
                        return false;
                    });

                    $('#has-many-relationship').off('click', '.remove').on('click', '.remove', function() {
                        $(this).closest('.has-many-relationship-form').hide();
                        $(this).closest('.has-many-relationship-form').find('.fom-removed').val(1);
                        return false;
                    });

                    /*$('.after-submit').iCheck({
                        checkboxClass: 'icheckbox_minimal-blue'
                    }).on('ifChecked', function() {
                        $('.after-submit').not(this).iCheck('uncheck');
                    });
                    $('.container-refresh').off('click').on('click', function() {
                        $.admin.reload();
                        $.admin.toastr.success('Refresh succeeded !', '', {
                            positionClass: "toast-top-center"
                        });
                    });*/
                });
            </script>

        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                <strong>Developed by <a href="mailto:julio.notodiprodyo@mncgroup.com" target="_blank">IT MNC Holding</a></strong> &nbsp;&nbsp;&nbsp;&nbsp;

                <strong>Env</strong>&nbsp;&nbsp; development
            </div>
            <!-- Default to the left -->
            <strong>© 2020 Copyright Master Data Management. All Right Reserved.</strong>
        </footer>

    </div>

    <script src="https://dev.mncdigital.info/public/docs/scripts/docstrap.lib.js"></script>
    <script src="https://dev.mncdigital.info/public/docs/scripts/toc.js"></script>
    <script type="text/javascript" src="https://dev.mncdigital.info/public/docs/scripts/fulltext-search-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
    <script src="/vendor/laravel-admin/moment/min/moment-with-locales.min.js"></script>
    <script src="/vendor/laravel-admin/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

</body>

</html>