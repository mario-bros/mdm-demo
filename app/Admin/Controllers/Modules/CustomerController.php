<?php
namespace App\Admin\Controllers\Modules;

use App\Helpers\Helper;

use App\Model\Lookups;
use App\Model\BusinessUnits\Profile as BusinessUnitProfile;
use App\Model\ProfileWeb;
use App\Model\MasterCompany;
use App\Model\Lookups\MDMProvince;
use App\Model\Lookups\MDMBank;
use App\Model\Lookups\MDMCity;
use App\Model\Extensions\MDMEmailTemplate;


use Encore\Admin\Form;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;


use App\Admin\GridCursorBasedPagination;
use App\Admin\Actions\Post\DetailCertified as Detail;
use App\Admin\Actions\Post\EditedCertified;
use App\Admin\Actions\Post\CompareGoldenRecord;
use App\Admin\Extensions\Exports\GoldenRecordExport;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{    
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index(Content $content)
    {
        $content->header(' Customer ')
                ->description(' Request ')
                ->body($this->grid())
                ->breadcrumb(
                    ['text' => 'New Request Customer']
                );

        // dd( $content ); 
        return $content;
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header(' Create ')
            ->description(' Customer ')
            ->body($this->form())
            ->breadcrumb(
                ['text' => 'New Request Customer', 'url' => '/new_request/customer'],
                ['text' => 'Create']
            );
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit()
    {
        return redirect('404');
    }

    /**
     * Show interface.
     *
     * @param $id
     * @return Content
     */
    public function show()
    {
        return redirect('404');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        // Session::put('lookup_name', 'pgsql'); 
        // dd(session()->all());
        $emptyRows = true;

        $queryUrl = $_GET;
        unset($queryUrl['_pjax']);

        array_walk_recursive($queryUrl, function ($item, $key) use (&$emptyRows)
        {
            if ($item != null || $item != "") $emptyRows = false;
        });

        $unitBrandNames = MasterCompany::pluck('brand_name', 'id');

        $grid = new GridCursorBasedPagination($emptyRows, new ProfileWeb());

        $grid->fixColumns(2);
        $grid->email1();
        /*$grid->column('Email')->display(function ($email1) {

            // If the value of the status field of this column is equal to 1, directly display the title field
            return $this->email1;

            // Otherwise it is displayed as editable
            // return $column->editable();
        });*/
        $grid->full_name();
        $grid->column('gender', __('Gender'))
                ->replace(['1' => 'Laki - laki', '2' => 'Perempuan']);

        $grid->kota_id('Kota Domisili')->display(function ($id_kota) {
            $strCitiesContainer = '';
            $city = MDMCity::select('name')->find($id_kota);
            if ($city) $strCitiesContainer .= "<span class='label label-warning'>{$city->name}</span>";
            return $strCitiesContainer;
        });

        $grid->dob('Umur')->display(function ($dob) {
            $dateOfBirth = new \DateTime($dob);
            $now = new \DateTime();
            $interval = $now->diff($dateOfBirth);

            if ( $interval->y == 0 ) return "<span class='label label-warning'>Unknovn</span>";

            return $interval->y;
        });

        if ( Admin::user()->inRoles(['holding', 'moderator', 'administrator']) ) {
            
            $grid->unit('Unit')->display(function ($unit) use ($unitBrandNames) {
                return $unitBrandNames[$unit];
            });

            /*$grid->unit('Unit')->display(function ($units) {
                $strUnitsContainer = '';
                foreach ($units as $row) {
                    if ( $row['unit'] != "" ) {
                        $unit = $row['unit'];
                        $strUnitsContainer .= "<span class='label label-warning'>{$unit}</span>  ";
                    }
                }

                return $strUnitsContainer;
            });*/
        }

        $grid->first_name();
        $grid->middle_name();
        $grid->last_name();
        $grid->address();

        $grid->model()->where('golden', '=', 'Y');

        // DISPLAY DATA ONLY BASED ON USER LOGIN
        if ( Admin::user()->inRoles(['holding', 'moderator', 'administrator']) ) {

        } else {
            // $userUnitName = Session::get('user')->unit_name;
            $userUnitName = Session::get('unit_name');
            $grid->model()->where('unit', $userUnitName);
        }

        $grid->disableCreateButton(); 

        // dd(Admin::user()->inRoles(['checker']));
        if ( Admin::user()->inRoles(['holding', 'moderator', 'administrator']) ) {
            $exporter = new GoldenRecordExport();
            $exporter->setParams($queryUrl);
            $exporterFileName = date('Y-m-d') . '-Golden-record-list.xlsx';
            $exporter->setFileName($exporterFileName);
            $grid->exporter($exporter);
        } else {
            $grid->disableExport();
        }

        $grid->expandFilter();
        $grid->filter(function ($filter) use ($unitBrandNames) {
            $filter->disableIdFilter();

            $filter->column(1 / 2, function ($filter) {
                $filter->ilike('customer_id', __('Customer ID'));

                $filter->between('dob', __('DOB'))->date();

                $filter->equal('propinsi_id', __('Propinsi'))->select( MDMProvince::pluck('name', 'id') )->load('kota_id', '/api/city');
                $filter->equal('kota_id', __('Kota / Kabupaten'))->select( [] );
                // $filter->equal('kota_id', __('Kota / Kabupaten'))->select( MDMCity::pluck('name', 'id') )->load('kelurahan_id', '/api/city');

                // $kotaCollection = collect( DB::select('SELECT distinct(kota) as kota FROM mdm_staging_customer_profile_clean ORDER by kota') );
                // $filter->equal('kota')->select( $kotaCollection->pluck('kota', 'kota') );
            });

            $filter->column(1 / 2, function ($filter) use ($unitBrandNames) {
                $filter->ilike('full_name', 'Name Contains');
                // $filter->like('full_name', __('Customer Full Name'));

                $filter->equal('email1', __('Email'))->email();

                if ( Admin::user()->inRoles(['holding', 'moderator', 'administrator']) ) {
                    // $filter->ilike('unit', __('Unit'));
                    $filter->where(function ($query)  {
                        $unit = $this->input;
                        $query->where('unit', '=', $unit);
                        /*$query->whereHas('unit', function ($query) use ($unit) {
                            $query->select('id');
                            $query->where('unit', '=', $unit);
                        });*/
                    }, 'Unit', 'unit')->select( $unitBrandNames );
                }
            });
        });

        // Hot Keys (['r' => 'Refresh page', 'c' => 'Go to the creation page', 'f' => 'Expand or hide the filter'])
        // $grid->enableHotKeys();
        // CREATE UNIQUE INDEX mdm_mst_kelurahan_name_idx ON mdm_dev.mdm_mst_kelurahan ("name",id);

        // $grid->disableBatchActions();
        $grid->disableTools();
        
        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableEdit();
            $actions->disableDelete();
            // $actions->add(new Detail);
            // $actions->add(new EditedCertified);
            $actions->add(new CompareGoldenRecord);
        });

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        // Insert data based on staging unit database
        // Session::put('lookup_name', Session::get('user')->lookup_name);

        // dd( Session::get('user')->lookup_name );
        $form = new Form(new BusinessUnitProfile);
        $u_id = strtoupper( \Str::uuid() );

        $form->tab('Profile', function ($form) use ($u_id) {

            $form->hidden('u_id')->default($u_id);
            /*$form->image('foto', __('Foto'))->name(function ($file) {
                return 'mdm.'.$file->guessExtension();
            });*/

            $form->row(function ($row) {
                $row->width(6)->text('customer_id', __('Customer ID'));
                $row->width(6)->text('full_name', __('Nama Lengkap'))->rules('required');
                $row->width(6)->text('first_name', __('Nama Depan'))->rules('required');
                $row->width(6)->text('middle_name', __('Nama Tengah'));
                $row->width(6)->text('last_name', __('Nama Belakang'));
                $row->width(6)->text('surname', __('Nama Panggilan'));
                $row->width(6)->date('dob', __('Tanggal Lahir'))->width(100)->rules('required');
                $row->width(6)->select('pob_id', __('Tempat Lahir'))->options(MDMCity::all()->pluck('name', 'id'));
                $row->width(6)->select('status_kawin_id', __('Status Kawin'))->options(Lookups::where('category', '=', strtoupper('Status Kawin'))->pluck('lookup_name', 'id'))->rules('required');
                $row->width(6)->select('mortalitas_id', __('Mortalitas'))->options(Lookups::where('category', '=', strtoupper('Mortalitas') )->pluck('lookup_name', 'id'));
            });

            $form->html('<fieldset></fieldset>');

            $form->row(function ($row) {
                $this->connection = Session::get('lookup_name');
                $row->width(6)->email('email')
                    ->creationRules(['required', "unique:{$this->connection}.mdm_customer_profile"])
                    ->updateRules(['required', "unique:{$this->connection}.mdm_customer_profile,email,{{id}}"]);
                $row->width(6)->select('category_user_id', __('Kategori Pengguna'))->options(Lookups::where('category', '=', strtoupper('Category User') )->pluck('lookup_name', 'id'));
                $row->width(6)->select('gender', __('Jenis Kelamin'))->options(Lookups::where('category', '=', strtoupper('Gender') )->pluck('lookup_name', 'id'))->rules('required');
                $row->width(6)->select('kewarganegaraan_id', __('Kewarganegaraan'))->options(Lookups::where('category', '=', strtoupper('Kewarganegaraan') )->pluck('lookup_name', 'id'));
                $row->width(6)->select('negara_id', __('Negara'))->options(Lookups::where('category', '=', strtoupper('Negara') )->pluck('lookup_name', 'id'));
                $row->width(6)->select('religion_id', __('Agama'))->options(Lookups::where('category', '=', strtoupper('Agama') )->pluck('lookup_name', 'id'));
                $row->width(6)->select('suku_id', __('Suku'))->options(Lookups::where('category', '=', strtoupper('Suku') )->pluck('lookup_name', 'id'));
                $row->width(6)->select('pendidikan_id', __('Pendidikan'))->options(Lookups::where('category', '=', strtoupper('Pendidikan') )->pluck('lookup_name', 'id'));
                $row->width(6)->select('profesi_id', __('Profesi'))->options(Lookups::where('category', '=', strtoupper('Profesi') )->pluck('lookup_name', 'id'));
                $row->width(6)->select('golongan_darah_id', __('Golongan Darah'))->options(Lookups::where('category', '=', strtoupper('Golongan Darah') )->pluck('lookup_name', 'id'));
            });

        })->tab('Address', function ($form) {
            $form->hasMany('address', function (Form\NestedForm $form) {
                $form->text('address', __('Alamat'))->icon('fa-address-book')->rules('required');
                $form->text('nomor', __('Nomor Rumah'))->rules('regex:/^\d+$/', ['regex' => 'code must be numbers'])->icon('fa-free-code-camp');
                $form->text('rt', __('RT'))->rules('regex:/^\d+$/', ['regex' => 'code must be numbers'])->icon('fa-free-code-camp');
                $form->text('rw', __('RW'))->rules('regex:/^\d+$/', ['regex' => 'code must be numbers'])->icon('fa-free-code-camp');
                $form->select('propinsi_id', __('Provinsi'))->options(
                    MDMProvince::pluck('name', 'id')
                )->load('kota_id', '/api/city');
                $form->select('kota_id', __('Kota'))->load('kecamatan_id', '/api/district');
                $form->select('kecamatan_id', __('Kecamatan'))->load('kelurahan_id', '/api/village');
                $form->select('kelurahan_id', __('Kelurahan'));
                $form->select('category_tempat_tinggal_id', __('Kategori Tempat Tinggal'))->options(Lookups::where('category', '=', strtoupper('Category Tempat Tinggal') )->pluck('lookup_name', 'id'));
                $form->select('status_keaktifan_id', __('Status Keaktifan'))->options(Lookups::where('category', '=', strtoupper('Status Keaktifan') )->pluck('lookup_name', 'id'));
                $form->select('status_data', __('Status Data'))->options(Lookups::where('category', '=', strtoupper('Status Verifikasi') )->pluck('lookup_name', 'id'));
                $form->text('kodepos', __('Kode Pos'))->rules('regex:/^\d+$/', ['regex' => 'code must be numbers'])->icon('fa-free-code-camp');
                $form->text('longitude', __('Longitude'))->icon('fa-free-code-camp');
                $form->text('latitude', __('Latitude'))->icon('fa-free-code-camp');
                // Form Latitude & Longitude using map yandex but not working if data more than one
                // $form->latlong('latitude', 'longitude', 'Latitude & Longitude')->height(400);
                $form->select('status_tempat_tinggal_id', __('Status Tempat Tinggal'))->options(Lookups::where('category', '=', strtoupper('Status Tempat Tinggal') )->pluck('lookup_name', 'id'));
                $form->select('type_tempat_tinggal_id', __('Tipe Tempat Tinggal'))->options(Lookups::where('category', '=', strtoupper('Type Tempat Tinggal') )->pluck('lookup_name', 'id'));
            });

        })->tab('Contact', function (Form $form) {
            $form->hasMany('contact', function (Form\NestedForm $form) {
                $form->text('contact_value', __('Contact Value'))->icon('fa-free-code-camp')->rules('required');
                $form->select('type_contact_id', __('Tipe Kontak'))->options(Lookups::where('category', '=', strtoupper('Type Contact') )->pluck('lookup_name', 'id'))->rules('required');
                $form->select('status_keaktifan_id', __('Status Keaktifan'))->options(Lookups::where('category', '=', strtoupper('Status Keaktifan') )->pluck('lookup_name', 'id'));
            });

        })->tab('Identity', function (Form $form) {
            $form->hasMany('identity', function (Form\NestedForm $form) {
                $form->select('category_identity_id', __('Identitas'))->options(Lookups::where('category', '=', strtoupper('Category Identity') )->pluck('lookup_name', 'id'))->rules('required');
                $form->text('nomor_identity', __('Nomor Identitas'))->rules('regex:/^\d+$/', ['regex' => 'code must be numbers'])->icon('fa-free-code-camp')->rules('required');
                $form->date('masa_berlaku', __('Masa Berlaku'))->format('YYYY-MM-DD')->width('100');
                $form->select('status_data', __('Status Data'))->options(Lookups::where('category', '=', strtoupper('Status Verifikasi') )->pluck('lookup_name', 'id'));
                $form->textarea('description', __('Deskripsi'))->rows(10);
            });

        })->tab('Bank Account', function (Form $form) {
            $form->hasMany('bank', function (Form\NestedForm $form) {
                $form->select('nama_bank', __('Bank'))->options(MDMBank::all()->pluck('name', 'id'))->rules('required');
                $form->select('cabang', __('Cabang Bank'))->options(MDMCity::all()->pluck('name', 'id'))->rules('required');
                $form->text('nomor_rekening', __('Nomor Rekening'))->rules('required|regex:/^\d+$/', ['regex' => 'code must be numbers'])->icon('fa-free-code-camp');
                $form->text('atas_nama', __('Atas Nama'))->rules('required');
                $form->select('status_keaktifan_id', __('Status Keaktifan'))->options(Lookups::where('category', '=', strtoupper('Status Keaktifan') )->pluck('lookup_name', 'id'));
                $form->select('status_data', __('Status Data'))->options(Lookups::where('category', '=', strtoupper('Status Verifikasi') )->pluck('lookup_name', 'id'));
            });

        })->tab('Unit', function (Form $form) {
            $form->hasMany('unit', __('Unit'), function (Form\NestedForm $form) {
                $form->select('unit_id', __('Unit'))->options(MasterCompany::where('id', Admin::user()->unit_id)->pluck('id', 'id'))->rules('required');
                $form->select('status_keaktifan_id', __('Status Keaktifan'))->options(Lookups::where('category', '=', strtoupper('Status Keaktifan') )->pluck('lookup_name', 'id'));
                $form->url('url_profile', __('Profile URL'));
            });

        })->tab('Attachment', function (Form $form) {
            $form->hasMany('attachment', function (Form\NestedForm $form) {
                $form->file('filename', __('Filename'))->rules('mimes:doc,docx,xlsx,pdf');
                $form->select('type_file_id', __('Type File'))->options(Lookups::where('category', '=', strtoupper('Type File') )->pluck('lookup_name', 'id'));
                $form->textarea('description', __('Deskripsi'))->rows(10);
            });

        })->tab('Relationship', function (Form $form) {
            $form->hasMany('relationship', function (Form\NestedForm $form) {
                $form->text('first_name', __('Nama Depan'))->rules('required');
                $form->text('last_name', __('Nama Belakang'));
                $form->date('dob', __('Tanggal Lahir'))->width(100)->rules('required');
                $form->select('pob_id', __('Tempat Lahir'))->options(MDMCity::all()->pluck('name', 'id'))->rules('required');
                $form->text('address', __('Alamat'))->icon('fa-address-book');
                $form->text('mobile_phone', __('Mobile Phone'))->rules('regex:/^\d+$/|min:10', ['regex' => 'code must be numbers', 'min' => 'code can not be less than 10 characters'])->icon('fa-address-book');
                $form->text('telephone', __('Telephone'))->icon('fa-address-book')->rules('regex:/^\d+$/|min:8', ['regex' => 'code must be numbers', 'min' => 'code can not be less than 8 characters']);
                $form->email('email', __('Email'))->rules('required');
                $form->select('gender', __('Jenis Kelamin'))->options(Lookups::where('category', '=', strtoupper('Gender') )->pluck('lookup_name', 'id'))->rules('required');
                $form->select('religion_id', __('Agama'))->options(Lookups::where('category', '=', strtoupper('Agama') )->pluck('lookup_name', 'id'))->rules('required');
                $form->select('profesi_id', __('Profesi'))->options(Lookups::where('category', '=', strtoupper('Profesi') )->pluck('lookup_name', 'id'));
                $form->select('status_kawin_id', __('Status Kawin'))->options(Lookups::where('category', '=', strtoupper('Status Kawin') )->pluck('lookup_name', 'id'))->rules('required');
                $form->select('relationship_id', __('Hubungan Keluarga'))->options(Lookups::where('category', '=', strtoupper('Relationship') )->pluck('lookup_name', 'id'))->rules('required');
                $form->select('category_identity_id', __('Identitas'))->options(Lookups::where('category', '=', strtoupper('Category Identity') )->pluck('lookup_name', 'id'));
                $form->text('nomor_identity', __('Nomor Identitas'))->rules('regex:/^\d+$/|min:8', ['regex' => 'code must be numbers', 'min' => 'code can not be less than 8 characters'])->icon('fa-free-code-camp')->rules('required');
                $form->date('masa_berlaku', __('Masa Berlaku'))->format('YYYY-MM-DD')->width('100');
                $form->select('status_data', __('Status Data'))->options(Lookups::where('category', '=', strtoupper('Status Verifikasi') )->pluck('lookup_name', 'id'));
            });
        });

        $form->saved(function (Form $form) {
            // After Save
            if ( ! empty($form->model()->id) ) {
                // Function send mail
                $pobID = MDMCity::where('id', '=', $form->model()->pob_id)->get();
                $genderID = Lookups::where('id', '=', $form->model()->gender)->get();
                $maritalStatusID = Lookups::where('id', '=', $form->model()->status_kawin_id)->get();
                $mortalitasID = Lookups::where('id', '=', $form->model()->mortalitas_id)->get();
                $nationalityID = Lookups::where('id', '=', $form->model()->kewarganegaraan_id)->get();
                $religionID = Lookups::where('id', '=', $form->model()->religion_id)->get();
                $tribeID = Lookups::where('id', '=', $form->model()->suku_id)->get();
                $educationID = Lookups::where('id', '=', $form->model()->pendidikan_id)->get();
                $professionID = Lookups::where('id', '=', $form->model()->profesi_id)->get();
                $bloodID = Lookups::where('id', '=', $form->model()->golongan_darah_id)->get();
                $categoryUserID = Lookups::where('id', '=', $form->model()->category_user_id)->get();

                $dataFind = [
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
                                        ['group', '=', 'email_order_success_customer'], 
                                        ['status', '=', '1'],
                                    ])->first();
                $contentCustomer = preg_replace($dataFind, $dataReplace, $contentCustomer->text);
                $data_mail_customer = [
                    'content' => $contentCustomer,
                ];

                $config = [
                    'to' => Admin::user()->email,
                    'replyTo' => 'julio.notodiprodyo@mncgroup.com',
                    'subject' => 'Order Success Customer To MDO',
                ];

                Helper::sendMail('mail.email_order_success_customer', $data_mail_customer, $config, []);
            }

            admin_toastr('Save succeeded !', 'success');
            return redirect()->route('customer.index');
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

        return $form;
    }

}
