<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>MNC Digital Integration</title>
    <!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
    <link type="text/css" rel="stylesheet" href="https://dev.mncdigital.info/public/docs/styles/sunlight.default.css">
    <link type="text/css" rel="stylesheet" href="https://dev.mncdigital.info/public/docs/styles/site.paper.css">
    <link type="text/css" rel="stylesheet" href="/css/custom.css">
    <!-- <link type="text/css" rel="stylesheet" href="/vendor/laravel-admin/AdminLTE/plugins/select2/select2.min.css"> -->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
    <link type="text/css" rel="stylesheet" href="/vendor/laravel-admin/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">

</head>

<body>
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
                        <a href="/help/integration/usage/serverside" class="dropdown">Input Test Page</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container" id="toc-content">
        <div class="row">
            <div class="col-md-8">
                <div id="main">
                    <div class="clearfix"></div>
                    <section class="readme-section">
                        <article>
                            <h1><a href="">Client-side Sample App</a></h1>
                            <br/>

                            <h3>Generate or Post Request</h3>
                            <p>Here is the simple page that show how to fill each criteria value </p>


                            <form action="{{ route('form-test-input.store') }}" method="post" >
                                @csrf

                                @isset($successMessage)
                                    <div class="col-md-12">
                                        <div class="alert-success">
                                            <span style="color:black; font-size: bold">{{ $successMessage }}</span>
                                        </div>
                                    </div>
                                @endisset

                                <h3>Customer Data</h3>
                                <br><br>

                                <div class="form-group">
                                    <label>Customer ID</label>
                                    <input type="input" class="form-control" name="customer_id" value="{{ old('customer_id') }}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="input" class="form-control" name="full_name" value="{{ old('full_name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Depan</label>
                                    <input type="input" class="form-control" name="first_name" value="{{ old('first_name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Tengah</label>
                                    <input type="input" class="form-control" name="middle_name" value="{{ old('middle_name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Belakang</label>
                                    <input type="input" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Marga</label>
                                    <input type="input" class="form-control" name="surname" value="{{ old('surname') }}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Panggilan</label>
                                    <input type="input" class="form-control" name="nickname" value="{{ old('nickname') }}">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        @foreach( \App\Model\Lookups::where('category', strtoupper('gender'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                            <option value="{{$select}}" {{ $select == old('gender')  ? 'selected' : '' }}>{{$option}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="input" class="form-control" name="dob" value="{{ old('dob') }}">
                                </div>
                                <div class="form-group">
                                    <label>Place Of Birth</label>
                                    <select class="form-control" name="pob">
                                        @foreach( \App\Model\Lookups\MDMCity::pluck('name', 'id')->all() as $select => $option)
                                            <option value="{{$select}}" {{ $select == old('pob')  ? 'selected' : '' }}>{{$option}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Suku</label>
                                    <select class="form-control" name="suku">
                                        @foreach( \App\Model\Lookups::where('category', strtoupper('suku'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                            <option value="{{$select}}" {{ $select == old('suku')  ? 'selected' : '' }}>{{$option}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kewarganegaraan</label>
                                    <select class="form-control" name="kewarganegaraan">
                                        @foreach( \App\Model\Lookups::where('category', strtoupper('kewarganegaraan'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                            <option value="{{$select}}" {{ $select == old('suku')  ? 'selected' : '' }}>{{$option}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <hr>

                                <h3>Customer Details</h3>

                                <fieldset id="address-fields">

                                    <div class="form-group">
                                        <p class="text-primary">ADDRESS DETAIL</p>
                                    </div>
                                    <br><br>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="textarea" class="form-control" name="addresses[0][address]">
                                    </div>

                                    <div class="form-group">
                                        <label>Propinsi</label>
                                        <select class="form-control" name="addresses[0][propinsi]" id="addresses-propinsi-0">
                                            <option value=""></option>
                                            @foreach( \App\Model\Lookups\MDMProvince::pluck('name', 'id')->all() as $select => $option)
                                                <option value="{{$select}}" >{{$option}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kota</label>
                                        <select class="form-control" name="addresses[0][kota]" id="addresses-kota-0">
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select class="form-control" name="addresses[0][kecamatan]" id="addresses-kecamatan-0">
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <select class="form-control" name="addresses[0][kelurahan]" id="addresses-kelurahan-0">
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Rw</label>
                                        <input type="input" class="form-control" name="addresses[0][rw]">
                                    </div>

                                    <div class="form-group">
                                        <label>Rt</label>
                                        <input type="input" class="form-control" name="addresses[0][rt]">
                                    </div>

                                    <div class="form-group">
                                        <label>Blok</label>
                                        <input type="input" class="form-control" name="addresses[0][blok]">
                                    </div>

                                    <div class="form-group">
                                        <label>Nomor</label>
                                        <input type="input" class="form-control" name="addresses[0][nomor]">
                                    </div>

                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="input" class="form-control" name="addresses[0][kodepos]">
                                    </div>

                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="input" class="form-control" name="addresses[0][longitude]">
                                    </div>

                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="input" class="form-control" name="addresses[0][latitude]">
                                    </div>

                                    <div class="form-group">
                                        <label>Status Tempat Tinggal</label>
                                        <select class="form-control" name="addresses[0][status_tempat_tinggal]" id="addresses-status_tempat_tinggal-0">
                                            @foreach( \App\Model\Lookups::where('category', strtoupper('status tempat tinggal'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                <option value="{{$select}}">{{$option}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tipe Tempat Tinggal</label>
                                        <select class="form-control" name="addresses[0][type_tempat_tinggal]" id="addresses-type_tempat_tinggal-0">
                                            @foreach( \App\Model\Lookups::where('category', strtoupper('type tempat tinggal'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                <option value="{{$select}}">{{$option}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kategori Tempat Tinggal</label>
                                        <select class="form-control" name="addresses[0][category_tempat_tinggal]" id="addresses-category_tempat_tinggal-0">
                                            @foreach( \App\Model\Lookups::where('category', strtoupper('category tempat tinggal'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                <option value="{{$select}}">{{$option}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Status Keaktifan</label>
                                        <select class="form-control" name="addresses[0][status_keaktifan]" id="addresses-status_keaktifan-0">
                                            @foreach( \App\Model\Lookups::where('category', strtoupper('status keaktifan'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                <option value="{{$select}}">{{$option}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Status Data</label>
                                        <select class="form-control" name="addresses[0][status_data]" id="addresses-status_data-0">
                                            @foreach( \App\Model\Lookups::where('category', strtoupper('Status Verifikasi'))->pluck('lookup_name', 'id')->all() as $select => $option)
                                                <option value="{{$select}}">{{$option}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Status Alamat</label>
                                        <input type="input" class="form-control" name="addresses[0][status_alamat]">
                                    </div>

                                    <div class="form-group">
                                        <label>Is Primary</label>
                                        <select class="form-control" name="addresses[0][isPrimary]">
                                            <option value=""> </option>
                                            <option value="1">TRUE</option>
                                            <option value="0">FALSE</option>
                                        </select>
                                    </div>

                                </fieldset>

                                <br><br>

                                <div class="input-group-append">
                                    <button class="btn btn-secondary" style="background-color:cadetblue; color:black;" type="submit" name="submit" value="generate">Generate payload request ( JSON format )</button>
                                    <button class="btn btn-secondary" style="background-color:tomato; color:black;" type="submit" name="submit" value="post">Post request</button>
                                </div>
                            </form>

                            <hr>

                        </article>
                    </section>
                </div>
            </div>

            <div class="clearfix"></div>

            @isset($json_payload)

                <div class="col-md-12">
                    <pre class="prettyprint source lang-html">
<code>
    {!! $json_payload !!}
</code>
                    </pre>
                </div>
            @endisset
            
        </div>
    </div>
    <br/>
    <br/>

    <footer>
        <p class="jsdoc-message">BigData Division - MNC Innovation Center 2020</p>
    </footer>
    <br/>

    <script src="/vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <script src="https://dev.mncdigital.info/public/docs/scripts/docstrap.lib.js"></script>
    <script src="https://dev.mncdigital.info/public/docs/scripts/toc.js"></script>
    <script type="text/javascript" src="https://dev.mncdigital.info/public/docs/scripts/fulltext-search-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
    <script src="/vendor/laravel-admin/moment/min/moment-with-locales.min.js"></script>
    <script src="/vendor/laravel-admin/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <script>
        $(function() {
            $("[id*='$']").each(function() {
                var $this = $(this);

                $this.attr("id", $this.attr("id").replace("$", "__"));
            });

            $(".tutorial-section pre, .readme-section pre, pre.prettyprint.source").each(function() {
                var $this = $(this);

                var example = $this.find("code");
                exampleText = example.html();
                var lang = /{@lang ('.*?')}/.exec(exampleText);
                if (lang && lang[1]) {
                    exampleText = exampleText.replace(lang[0], "");
                    example.html(exampleText);
                    lang = lang[1];
                } else {
                    var langClassMatch = example.parent()[0].className.match(/lang\-(\S+)/);
                    lang = langClassMatch ? langClassMatch[1] : "javascript";
                }

                if (lang) {

                    $this
                        .addClass("sunlight-highlight-" + lang)
                        .addClass("linenums")
                        .html(example.html());

                }
            });

            Sunlight.highlightAll({
                lineNumbers: false,
                showMenu: true,
                enableDoclinks: true
            });

            $.catchAnchorLinks({
                navbarOffset: 10
            });
            $("#toc").toc({
                anchorName: function(i, heading, prefix) {
                    return $(heading).attr("id") || (prefix + i);
                },
                selectors: "#toc-content h1,#toc-content h2,#toc-content h3,#toc-content h4",
                showAndHide: false,
                smoothScrolling: true
            });

            $("#main span[id^='toc']").addClass("toc-shim");
            $('.dropdown-toggle').dropdown();

            $("table").each(function() {
                var $this = $(this);
                $this.addClass('table');
            });

            $("[name='gender'], [name='pob'], [name='suku'], [name='kewarganegaran']").select2({"allowClear":true});
            $("[name='dob']").datetimepicker({format: 'YYYY-MM-DD'});

            // $("input[name='addresses[0][kelurahan]']").select2({"allowClear":true,"placeholder":{"id":"","text":"Kelurahan"}});

            $("#addresses-kelurahan-0, " + 
                "#addresses-kecamatan-0, " + 
                "#addresses-kota-0, " + 
                "#addresses-propinsi-0, " + 
                "#addresses-status_tempat_tinggal-0, " + 
                "#addresses-type_tempat_tinggal-0, " + 
                "#addresses-category_tempat_tinggal-0, " + 
                "#addresses-status_keaktifan-0, " + 
                "#addresses-status_data-0").select2({"allowClear":true});

            $("#addresses-propinsi-0").change( function() {

                // console.log( $(this).val() );
                var province_id = $(this).val()

                // alert( this.val() );

                $.ajax({
                    type: 'GET',
                    url: '/api/ajax/get/cities/' + province_id,
                    success: function(responseData) {
                        // data = JSON.stringify(responseData)
                        // data = JSON.parse(responseData)
                        console.log( responseData );
                        // console.log( Object.keys( responseData ) );
                        var results = []

                        responseData.forEach(function(item, index) {
                            var option = {}
                            // console.log( Object.keys(item)  );
                            console.log( item  );
                            option["id"] = item['id']
                            option["text"] = item['text']
                            results.push(option)
                        })

                        $("#addresses-kota-0").html('').select2({
                                data: results
                            }
                        );

                        $("#addresses-kecamatan-0").html('')
                        $("#addresses-kelurahan-0").html('')
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            })

            $("#addresses-kota-0").change( function() {
                var regency_id = $(this).val()

                $.ajax({
                    type: 'GET',
                    url: '/api/ajax/get/districts/' + regency_id,
                    success: function(responseData) {
                        var results = []

                        responseData.forEach(function(item, index) {
                            var option = {}
                            option["id"] = item['id']
                            option["text"] = item['text']
                            results.push(option)
                        })

                        $("#addresses-kecamatan-0").html('').select2({data: results} );
                        $("#addresses-kelurahan-0").html('')
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            })

            $("#addresses-kecamatan-0").change( function() {
                var regency_id = $(this).val()

                $.ajax({
                    type: 'GET',
                    url: '/api/ajax/get/villages/' + regency_id,
                    success: function(responseData) {
                        var results = []

                        responseData.forEach(function(item, index) {
                            var option = {}
                            option["id"] = item['id']
                            option["text"] = item['text']
                            results.push(option)
                        })

                        $("#addresses-kelurahan-0").html('').select2({data: results} );
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            })
        });
    </script>
</body>
</html>