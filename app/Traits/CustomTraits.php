<?php
namespace App\Traits;

use Encore\Admin\Form;
use App\Admin\Form as CustomForm;
use App\Admin\Grid;
use App\Admin\Form\CustomNestedForm;

use App\Model\GlobalReports\Profile as GlobalReportProfile;
use App\Model\GlobalReports\Address as GlobalReportAddress;
use App\Model\GlobalReports\Contact as GlobalReportContact;
use App\Model\GlobalReports\Identity as GlobalReportIdentity;
use App\Model\GlobalReports\BankAccount as GlobalReportBankAccount;
use App\Model\GlobalReports\Unit as GlobalReportUnit;
use App\Model\GlobalReports\Attachment as GlobalReportAttachment;
use App\Model\GlobalReports\Relationship as GlobalReportRelationship;
use App\Model\GlobalReports\OrderStatus as GlobalReportOrderStatus;

use App\Model\Profile;
use App\Model\ProfileWeb;
use App\Model\ProfileClean;
use App\Model\OrderStatus;
use App\Model\Lookups;
use App\Model\MasterCompany;
use App\Model\Extensions\MDMEmailTemplate;

use App\Model\Lookups\MDMCity;
use App\Model\Lookups\MDMVillage;
use App\Model\Lookups\MDMDistrict;
use App\Model\Lookups\MDMProvince;

use Encore\Admin\Widgets\Table;

use Illuminate\Support\Facades\Session;

use App\Helpers\Helper;
use Encore\Admin\Admin;

trait CustomTraits
{
    /**
     * Filter for Request Controller.
     *
     * @return Filter
     */
    protected function LoadFilter($filter)
    {
        $filter->disableIdFilter();
        $filter->column(1 / 2, function ($filter) {
            $filter->like('full_name', __('Name'));
            $filter->where(function ($query) {
                $identity = $this->input;
                $query->whereHas('identity', function ($query) use ($identity) {
                    $query->where('nomor_identity', '=', $identity);
                })->get();
            }, 'Identity Number')->integer();
            $filter->where(function ($query) {
                $contact = $this->input;
                $query->whereHas('contact', function ($query) use ($contact) {
                    $query->where('contact_value', '=', $contact);
                })->get();
            }, 'Phone Number')->integer();
        });

        $filter->column(1 / 2, function ($filter) {
            $filter->like('email', __('Email'))->email();
            $filter->like('category_user_id', __('Category User'))->select(Lookups::where('category', '=', 'Category User')->pluck('lookup_name', 'id'));
            $filter->where(function ($query) {
                $unit = $this->input;
                $query->whereHas('unit', function ($query) use ($unit) {
                    $query->where('unit_id', '=', $unit);
                })->get();
            }, 'Unit')->select(MasterCompany::pluck('id', 'id'));
        });
    }

    /**
     * Grid for Request Controller.
     *
     * @return Grid
     */
    protected function LoadGrid()
    {
        $grid = new Grid(new GlobalReportProfile);
        // dd( $grid );

        $grid->column('email', __('Email'))->expand(function () {
            $file_array = array('First Name' => $this->first_name, 'Last Name' => $this->last_name, 'DOB' => $this->dob, 'Created At' => $this->created_at, 'Updated At' => $this->updated_at);
            $rows       = array_only($file_array, ['First Name', 'Last Name', 'DOB', 'Created At', 'Updated At']);
            return new Table([], $rows);
        })->sortable();

        $grid->column('full_name', __('Full Name'));

        $grid->genderID()->lookup_name(trans('admin.gender'));

        $grid->CategoryUser()->lookup_name(trans('admin.category_user_id'));

        $grid->column('flag_process', __('Status Certify Data'))
            ->replace([0 => 25, 1 => 50, 2 => 75, 3 => 100])
            ->progressBar('danger', 'sm', 100)
            ->help('25% = New Customer, 50% = Proposed, 75% = Approved, 100% = Certify');

        /*$lookup = Lookups::where('category', 'Unit')->pluck('lookup_name', 'id')->toArray();
        $grid->unit()->display( function($unitID) {
            foreach($unitID as $value){
                return $value['unit_id'];
            }
            if($unitID == null){
                return "<span class='label label-danger'>Unknown</span>";
            }
        })->replace($lookup);*/

        $grid->createdBy()->name(trans('admin.created_by'));

        return $grid;
    }

    /**
     * Detail for All Menu Customer.
     *
     * @return Grid
     */
    public function LoadDetail($body, $slug = null)
    {
        if(!empty($slug)){
            $id = $body;
        } else{
            $id = $body->model()->u_id;
        }

        // dd($id);

        // Get data table profile
        $profile = GlobalReportProfile::with(['genderID', 'CategoryUser', 'statusKawinID', 'mortalitasID', 'kewarganegaraanID', 'negaraID', 'agamaID', 'sukuID', 'pendidikanID', 'profesiID', 'golonganDarahID'])
            ->where('u_id', '=', $id)->first();
        if($profile == null){
            return 'Data Not Found';
        }

        // Get data table and relation address
        $getAdd = [];
        $countAdd = GlobalReportAddress::where('u_id', '=', $id)->count();
        // $address = Address::with(['categoryTempatTinggalID', 'statusKeaktifanID', 'statusData', 'statusTempatTinggalID', 'typeTempatTinggalID', 'provinsiID', 'kotaID', 'kecamatanID', 'kelurahanID'])
        $address = GlobalReportAddress::with(['categoryTempatTinggalID', 'statusKeaktifanID', 'statusData', 'statusTempatTinggalID', 'typeTempatTinggalID'])
            ->orderBy('id')
            ->where('u_id', '=', $id)->get();
        foreach($address as $index => $value){
            $getAdd[($index + 1)] = $value;
        }


        // Get data table and relation contact
        $getCont = [];
        $countCont = GlobalReportContact::where('u_id', '=', $id)->count();
        $contact = GlobalReportContact::with(['tipeKontak', 'statusKeaktifanID'])
            ->orderBy('id')
            ->where('u_id', '=', $id)->get();
        foreach($contact as $index => $value){
            $getCont[($index + 1)] = $value;
        }

        // Get data table and relation identity
        $getIdent = [];
        $countIdent = GlobalReportIdentity::where('u_id', '=', $id)->count();
        $identity = GlobalReportIdentity::with(['categoryIdentityID', 'statusData'])
            ->orderBy('id')
            ->where('u_id', '=', $id)->get();
        foreach($identity as $index => $value){
            $getIdent[($index + 1)] = $value;
        }

        // Get data table and relation bank account
        $getBank = [];
        $countBank = GlobalReportBankAccount::where('u_id', '=', $id)->count();
        // $bank = BankAccount::with(['namaBank', 'kotaID',  'statusKeaktifanID', 'statusData'])
        $bank = GlobalReportBankAccount::with(['namaBank', 'statusKeaktifanID', 'statusData'])
            ->orderBy('id')
            ->where('u_id', '=', $id)->get();
        foreach($bank as $index => $value){
            $getBank[($index + 1)] = $value;
        }

        // Get data table and relation bank account
        $getUnit = [];
        $countUnit = GlobalReportUnit::where('u_id', '=', $id)->count();
        $unit = GlobalReportUnit::with(['unitID', 'statusKeaktifanID'])
            ->orderBy('id')
            ->where('u_id', '=', $id)->get();
        foreach($unit as $index => $value){
            $getUnit[($index + 1)] = $value;
        }

        // Get data table and relation attachment
        $getAttach = [];
        $countAttachment = GlobalReportAttachment::where('u_id', '=', $id)->count();
        $attachment = GlobalReportAttachment::with('typeFileID')
            ->orderBy('id')
            ->where('u_id', '=', $id)->get();
        foreach($attachment as $index => $value){
            $getAttach[($index + 1)] = $value;
        }

        // Get data table and relation relationship
        $getRelat = [];
        $countRelationship = GlobalReportRelationship::where('u_id', '=', $id)->count();
        // $relationship = Relationship::with(['genderID', 'agamaID', 'profesiID', 'statusKawinID', 'hubunganKeluargaID', 'identitasID', 'statusData', 'kotaID'])
        $relationship = GlobalReportRelationship::with(['genderID', 'agamaID', 'profesiID', 'statusKawinID', 'hubunganKeluargaID', 'identitasID', 'statusData'])
            ->orderBy('id')
            ->where('u_id', '=', $id)->get();
        foreach($relationship as $index => $value){
            $getRelat[($index + 1)] = $value;
        }

         // Get data table and relation status
        $status = GlobalReportOrderStatus::with(['user'])
            ->orderBy('id','DESC')
            ->where('u_id', '=', $id)->get();

        return view('admin.custom.show', compact('profile', 'getAdd', 'getCont', 'getIdent', 'getBank', 'getUnit', 'getAttach', 'getRelat', 'status', 'countAdd', 'countCont', 'countIdent', 'countBank', 'countUnit', 'countAttachment', 'countRelationship'));
    }

    public function LoadDetailGoldenRecord($body, $slug = null)
    {
        if(!empty($slug)){
            $id = $body;
        } else{
            $id = $body->model()->u_id;
        }

        // Get data table profile
        $profile = ProfileClean::where('u_id', '=', $id)->first();

        // dd($profile);
        if($profile == null){
            return 'Data Not Found';
        }

        return view('admin.custom.show', compact('profile'));
    }

    /**
     * Form for Golden Records.
     *
     * @return Grid
     */
    public function LoadFormGR($slug=null)
    {
        // if(request()->segment(2) == 'compare'){
        //     foreach (Helper::HighlightCompare() as $value) {
        //         Admin::style($value);
        //     }
        // }

        // dd(Session::get('user')->lookup_name);

        $form = new CustomForm(new ProfileWeb);

        $form->tab('Profile', function (CustomForm $form) {
            /*$form->image('foto', __('Foto'))->name(function ($file) {
                return 'mdm.' . $file->guessExtension();
            });*/

            $form->row(function ($row) {
                $row->width(6)->text('uid_golden', __('MNC ID'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('full_name', __('Nama Lengkap'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_gender', __('Jenis Kelamin'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->date('dob', __('Tanggal Lahir'))->disable();
                $row->width(6)->text('pob', __('Tempat Lahir'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->textarea('address', __('Alamat'))->placeholder(' ')->disable();
                $row->width(3)->text('nomor', __('Nomor Rumah'))->icon('fa-free-code-camp')->placeholder(' ')->withoutIcon()->disable();
                $row->width(3)->text('blok', __('Blok'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(3)->text('rt', __('RT'))->icon('fa-free-code-camp')->placeholder(' ')->withoutIcon()->disable();
                $row->width(3)->text('rw', __('RW'))->icon('fa-free-code-camp')->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_kelurahan', __('Kelurahan'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_kecamatan', __('Kecamatan'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_kota', __('Kota'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_propinsi', __('Propinsi'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('kodepos', __('Kode Pos'))->icon('fa-free-code-camp')->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_status_tempat_tinggal', __('Status Tempat Tinggal'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_type_tempat_tinggal', __('Tipe Tempat Tinggal'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_category_tempat_tinggal', __('Kategori Tempat Tinggal'))->placeholder(' ')->withoutIcon()->disable();

                $row->width(6)->html('<br>');
                $row->width(6)->html('<br>');
                // $row->width(6)->html('<fieldset></fieldset>');

                $row->width(6)->text('email1', __('Email 1'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('email2', __('Email 2'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('telepon_rumah', __('Telepon Rumah'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('telepon_kantor', __('Telepon Kantor'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('fax', __('Fax'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('mobile_phone1', __('Mobile Phone 1'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('mobile_phone2', __('Mobile Phone 2'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_category_identity', __('Tipe Identitas'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('ktp', __('Nomor Identitas'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_suku', __('Suku'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_kewarganegaraan', __('Kewarganegaraan'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_negara', __('Negara'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_religion', __('Agama'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_pendidikan', __('Pendidikan'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_profesi', __('Profesi'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_golongan_darah', __('Golongan Darah'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_status_kawin', __('Status Kawin'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_mortalitas', __('Status Mortalitas'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_category_user', __('Kategori User'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_status_keaktifan', __('Status Keaktifan'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('longitude', __('Longitude'))->icon('fa-free-code-camp')->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('latitude', __('Latitude'))->icon('fa-free-code-camp')->placeholder(' ')->withoutIcon()->disable();
                // $row->width(6)->text('alias_status_pengkinian_data', __('Status Pengkinian Data'))->placeholder(' ')->withoutIcon()->disable();
            });

            // $form->html('<fieldset></fieldset>');

        })->tab('Product', function (CustomForm $form) {
            $form->hasMany('products', function (CustomNestedForm $nestedForm) {

                // dd($nestedForm->text('address', __('Alamat'))->icon('fa-address-book')->placeholder(' ')->withoutIcon()->readonly());
                $nestedForm->text('customer_id', __('Customer ID'))->placeholder(' ')->withoutIcon()->disable();
                $nestedForm->textarea('product', __('Produk'))->placeholder(' ')->disable();
                // Form Latitude & Longitude using map yandex but not working if data more than one
                // $form->latlong('latitude', 'longitude', 'Latitude & Longitude')->height(400);

                $nestedForm->disableDelete();
                // $nestedForm->disableCreate();
            });

        });
        /*->tab('Attachment', function (Form $form) {
            $form->hasMany('attachment', function (Form\NestedForm $form) {
                $form->hidden('u_id');
                $form->file('filename', __('Filename'))->rules('mimes:doc,docx,xlsx,pdf');
                $form->select('type_file_id', __('Type File'))->options(Lookups::where('category', '=', strtoupper('Type File'))->pluck('lookup_name', 'id'));
                $form->textarea('description', __('Deskripsi'))->rows(10);
            });

        })
        ->tab('Relationship', function (Form $form) {
            $form->hasMany('relationship', function (Form\NestedForm $form) {
                $form->hidden('u_id');
                $form->text('first_name', __('Nama Depan'))->rules('required');
                $form->text('last_name', __('Nama Belakang'));
                $form->date('dob', __('Tanggal Lahir'))->width(100)->rules('required');
                $form->select('pob_id', __('Tempat Lahir'))->options(MDMCity::all()->pluck('name', 'id'))->rules('required');
                $form->text('address', __('Alamat'))->icon('fa-address-book');
                $form->text('mobile_phone', __('Mobile Phone'))->rules('regex:/^\d+$/|min:10', ['regex' => 'code must be numbers', 'min' => 'code can not be less than 10 characters'])->icon('fa-address-book');
                $form->text('telephone', __('Telephone'))->icon('fa-address-book')->rules('regex:/^\d+$/|min:8', ['regex' => 'code must be numbers', 'min' => 'code can not be less than 8 characters']);
                $form->email('email', __('Email'))->rules('required');
                $form->select('gender', __('Jenis Kelamin'))->options(Lookups::where('category', '=', strtoupper('Gender'))->pluck('lookup_name', 'id'))->rules('required');
                $form->select('religion_id', __('Agama'))->options(Lookups::where('category', '=', strtoupper('Agama'))->pluck('lookup_name', 'id'))->rules('required');
                $form->select('profesi_id', __('Profesi'))->options(Lookups::where('category', '=', strtoupper('Profesi'))->pluck('lookup_name', 'id'));
                $form->select('status_kawin_id', __('Status Kawin'))->options(Lookups::where('category', '=', strtoupper('Status Kawin'))->pluck('lookup_name', 'id'))->rules('required');
                $form->select('relationship_id', __('Hubungan Keluarga'))->options(Lookups::where('category', '=', strtoupper('Relationship'))->pluck('lookup_name', 'id'))->rules('required');
                $form->select('category_identity_id', __('Identitas'))->options(Lookups::where('category', '=', strtoupper('Category Identity'))->pluck('lookup_name', 'id'));
                $form->text('nomor_identity', __('Nomor Identitas'))->rules('regex:/^\d+$/|min:8', ['regex' => 'code must be numbers', 'min' => 'code can not be less than 8 characters'])->icon('fa-free-code-camp')->rules('required');
                $form->date('masa_berlaku', __('Masa Berlaku'))->format('YYYY-MM-DD')->width('100');
                $form->select('status_data', __('Status Data'))->options(Lookups::where('category', '=', strtoupper('Status Verifikasi'))->pluck('lookup_name', 'id'));
            });
        });*/

        $form->saved(function (Form $form) use($slug){
            //cek customer's flag status
            $getStats = OrderStatus::where('u_id',$form->model()->u_id)->orderBy('id','desc')->first();
            // dd($getStats);

            $stats_flag = $getStats['flag_process'] ?? '';
            $stats_reject = $getStats['is_rejected'] ?? '';
            //get mdo data
            $getMDO = OrderStatus::with('user')->where('u_id',$form->model()->u_id)->get();

            if($stats_flag.$stats_reject != 10 && $slug==null){
                //Function send mail
                $pobID           = MDMCity::where('id', '=', $form->model()->pob_id)->get();
                $genderID        = Lookups::where('id', '=', $form->model()->gender)->get();
                $maritalStatusID = Lookups::where('id', '=', $form->model()->status_kawin_id)->get();
                $mortalitasID    = Lookups::where('id', '=', $form->model()->mortalitas_id)->get();
                $nationalityID   = Lookups::where('id', '=', $form->model()->kewarganegaraan_id)->get();
                $religionID      = Lookups::where('id', '=', $form->model()->religion_id)->get();
                $tribeID         = Lookups::where('id', '=', $form->model()->suku_id)->get();
                $educationID     = Lookups::where('id', '=', $form->model()->pendidikan_id)->get();
                $professionID    = Lookups::where('id', '=', $form->model()->profesi_id)->get();
                $bloodID         = Lookups::where('id', '=', $form->model()->golongan_darah_id)->get();
                $categoryUserID  = Lookups::where('id', '=', $form->model()->category_user_id)->get();
                $user            = $getMDO[count($getMDO)-2]['user']['name'] ?? '';
                $dataFind        = [
                    '/\{\{\$user\}\}/',
                    '/\{\{\$customer_id\}\}/', 
                    '/\{\{\$full_name\}\}/', 
                    '/\{\{\$first_name\}\}/', 
                    '/\{\{\$middle_name\}\}/', 
                    '/\{\{\$last_name\}\}/', 
                    '/\{\{\$surname\}\}/', 
                    '/\{\{\$email\}\}/', 
                    '/\{\{\$dob\}\}/', 
                    '/\{\{\$pob_id\}\}/', 
                    '/\{\{\$gender\}\}/', 
                    '/\{\{\$status_kawin_id\}\}/', 
                    '/\{\{\$mortalitas_id\}\}/', 
                    '/\{\{\$kewarganegaraan_id\}\}/', 
                    '/\{\{\$religion_id\}\}/', 
                    '/\{\{\$suku_id\}\}/', 
                    '/\{\{\$pendidikan_id\}\}/', 
                    '/\{\{\$profesi_id\}\}/', 
                    '/\{\{\$golongan_darah_id\}\}/', 
                    '/\{\{\$category_user_id\}\}/'
                ];

                $dataReplace = [
                    $user,
                    $form->model()->customer_id, 
                    $form->model()->full_name, 
                    $form->model()->first_name, 
                    $form->model()->middle_name, 
                    $form->model()->last_name, 
                    $form->model()->surname, 
                    $form->model()->email, 
                    $form->model()->dob, 
                    $pobID[0]['name'], 
                    $genderID[0]['lookup_name'], 
                    $maritalStatusID[0]['lookup_name'], 
                    $mortalitasID[0]['lookup_name'], 
                    $nationalityID[0]['lookup_name'], 
                    $religionID[0]['lookup_name'], 
                    $tribeID[0]['lookup_name'], 
                    $educationID[0]['lookup_name'], 
                    $professionID[0]['lookup_name'], 
                    $bloodID[0]['lookup_name'], 
                    $categoryUserID[0]['lookup_name']
                ];

                $contentCustomer = MDMEmailTemplate::where([
                    ['group', '=', 'email_compare'], ['status', '=', '1'],
                ])->first();
                $contentCustomer    = preg_replace($dataFind, $dataReplace, $contentCustomer->text);
                $data_mail_customer = [
                    'content' => $contentCustomer,
                ];
                $config = [
                    'to'      => $getMDO[count($getMDO)-2]['user']['email'] ?? '',
                    'replyTo' => 'julio.notodiprodyo@mncgroup.com',
                    'subject' => 'Customer Compared',
                ];

                Helper::sendMail('mail.email_compare', $data_mail_customer, $config, []);
            }

            admin_toastr('Save succeeded !', 'success');
            return redirect()->route('customers','notification');
        });

        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete();
            $tools->disableView();
        });

        $form->footer(function ($footer) {
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
            $footer->disableCreatingCheck();
            $footer->disableReset();
            $footer->disableSubmit();

        });

        return $form;
    }

    public function LoadFormGRClean($connectionUnit=null)
    {
        // if(request()->segment(2) == 'compare'){
        //     foreach (Helper::HighlightCompare() as $value) {
        //         Admin::style($value);
        //     }
        // }

        // dd($connectionUnit);

        $businessUnitProfileInstance = Helper::businessUnitInstanceByUnit($connectionUnit);
        $form = new CustomForm( $businessUnitProfileInstance );

        $form->tab('Raw Data', function ($form) {
 
            $form->row(function ($row) {
                $row->width(6)->text('customer_id', __('Customer ID'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('full_name', __('Nama Lengkap'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_gender', __('Jenis Kelamin'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->date('dob', __('Tanggal Lahir'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('pob', __('Tempat Lahir'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->textarea('address', __('Alamat'))->placeholder(' ')->disable();
                $row->width(3)->text('nomor', __('Nomor Rumah'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(3)->text('blok', __('Blok'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(3)->text('rt', __('RT'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(3)->text('rw', __('RW'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('kelurahan', __('Kelurahan'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('kecamatan', __('Kecamatan'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('kota', __('Kota'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('propinsi', __('Propinsi'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('kodepos', __('Kode Pos'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_status_tempat_tinggal', __('Status Tempat Tinggal'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_type_tempat_tinggal', __('Tipe Tempat Tinggal'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_category_tempat_tinggal', __('Kategori Tempat Tinggal'))->placeholder(' ')->withoutIcon()->disable();
            });

            $form->html('<fieldset></fieldset>');

            $form->row(function ($row) {
                $row->width(6)->text('email1', __('Email 1'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('email2', __('Email 2'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('telepon_rumah', __('Telepon Rumah'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('telepon_kantor', __('Telepon Kantor'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('fax', __('Fax'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('mobile_phone1', __('Mobile Phone 1'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('mobile_phone2', __('Mobile Phone 2'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_id_type', __('Tipe Identitas'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('ktp', __('Nomor Identitas'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('suku', __('Suku'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_kewarganegaraan', __('Kewarganegaraan'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('negara', __('Negara'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_religion', __('Agama'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('pendidikan', __('Pendidikan'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_profesi', __('Profesi'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_golongan_darah', __('Golongan Darah'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('alias_status_kawin', __('Status Kawin'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('mortalitas', __('Mortalitas'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('category_user', __('Kategori User'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('status_keaktifan', __('Status Keaktifan'))->placeholder(' ')->withoutIcon()->disable();
                // $row->width(6)->text('status_pengkinian_data', __('Status Pengkinian Data'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('category', __('Kategori'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('longitude', __('Longitude'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->text('latitude', __('Latitude'))->placeholder(' ')->withoutIcon()->disable();
                $row->width(6)->textarea('product', __('Produk'))->placeholder(' ')->disable();
            });
        });



        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete();
            $tools->disableView();
        });

        $form->footer(function ($footer) {
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
            $footer->disableCreatingCheck();
        });

        $form->disableSubmit();
        $form->disableReset();

        // dd($form);

        return $form;
    }
}
