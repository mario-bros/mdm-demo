<?php

namespace App\Admin\Controllers\Custom;

use Encore\Admin\Form;
use App\Model\Lookups;
use App\Model\Profile;
use App\Model\Lookups\MDMBank;
use App\Model\Lookups\MDMCity;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Model\Lookups\MDMProvince;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class EditedCertifiedController extends Controller
{
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return redirect('404');
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header(' Edited ');
            $content->description(' Certified ');
            $content->body($this->formCertified()->edit($id));
            $content->breadcrumb(
                ['text' => 'Edited Certified']
            );
        });
    }

    /**
     * Show the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return redirect('404');
    }

    /**
     * Form interface.
     *
     * @return Content
     */
    private function formCertified()
    {
        // Insert data based on staging unit database
        // Session::put('lookup_name', 'pgsql');

        // Get form insert
        $form = new Form(new Profile); // from business units
        $form->tab('Profile', function ($form) {

            $form->hidden('u_id');
            $form->image('foto', __('Foto'))->name(function ($file) {
                return 'mdm.'.$file->guessExtension();
            });

            $form->row(function ($row) {
                $row->width(6)->text('customer_id', __('Customer ID'));
                $row->width(6)->text('full_name', __('Nama Lengkap'))->rules('required');
                $row->width(6)->text('first_name', __('Nama Depan'))->rules('required');
                $row->width(6)->text('middle_name', __('Nama Tengah'));
                $row->width(6)->text('last_name', __('Nama Belakang'));
                $row->width(6)->text('surname', __('Nama Panggilan'));
                $row->width(6)->date('dob', __('Tanggal Lahir'))->width(100)->rules('required');
                $row->width(6)->select('pob_id', __('Tempat Lahir'))->options(MDMCity::all()->pluck('name', 'id'));
                $row->width(6)->select('status_kawin_id', __('Status Kawin'))->options(Lookups::where('category', '=', 'Status Kawin')->pluck('lookup_name', 'id'))->rules('required');
                $row->width(6)->select('mortalitas_id', __('Mortalitas'))->options(Lookups::where('category', '=', 'Mortalitas')->pluck('lookup_name', 'id'));
            });

            $form->html('<fieldset></fieldset>');

            $form->row(function ($row) {
                $this->connection = Session::get('lookup_name');
                $row->width(6)->email('email')
                    ->creationRules(['required', "unique:{$this->connection}.mdm_customer_profile"])
                    ->updateRules(['required', "unique:{$this->connection}.mdm_customer_profile,email,{{id}}"]);
                $row->width(6)->select('category_user_id', __('Kategori Pengguna'))->options(Lookups::where('category', '=', 'Category User')->pluck('lookup_name', 'id'));
                $row->width(6)->select('gender', __('Jenis Kelamin'))->options(Lookups::where('category', '=', 'Gender')->pluck('lookup_name', 'id'))->rules('required');
                $row->width(6)->select('kewarganegaraan_id', __('Kewarganegaraan'))->options(Lookups::where('category', '=', 'Kewarganegaraan')->pluck('lookup_name', 'id'));
                $row->width(6)->select('negara_id', __('Negara'))->options(Lookups::where('category', '=', 'Negara')->pluck('lookup_name', 'id'));
                $row->width(6)->select('religion_id', __('Agama'))->options(Lookups::where('category', '=', 'Agama')->pluck('lookup_name', 'id'));
                $row->width(6)->select('suku_id', __('Suku'))->options(Lookups::where('category', '=', 'Suku')->pluck('lookup_name', 'id'));
                $row->width(6)->select('pendidikan_id', __('Pendidikan'))->options(Lookups::where('category', '=', 'Pendidikan')->pluck('lookup_name', 'id'));
                $row->width(6)->select('profesi_id', __('Profesi'))->options(Lookups::where('category', '=', 'Profesi')->pluck('lookup_name', 'id'));
                $row->width(6)->select('golongan_darah_id', __('Golongan Darah'))->options(Lookups::where('category', '=', 'Golongan Darah')->pluck('lookup_name', 'id'));
            });

        })->tab('Address', function ($form) {
            $form->hasMany('address', function (Form\NestedForm $form) {
                $form->hidden('u_id');
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
                $form->select('category_tempat_tinggal_id', __('Kategori Tempat Tinggal'))->options(Lookups::where('category', '=', 'Category Tempat Tinggal')->pluck('lookup_name', 'id'));
                $form->select('status_keaktifan_id', __('Status Keaktifan'))->options(Lookups::where('category', '=', 'Status Keaktifan')->pluck('lookup_name', 'id'));
                $form->select('status_data', __('Status Data'))->options(Lookups::where('category', '=', 'Status Verifikasi')->pluck('lookup_name', 'id'));
                $form->text('kodepos', __('Kode Pos'))->rules('regex:/^\d+$/', ['regex' => 'code must be numbers'])->icon('fa-free-code-camp');
                $form->text('longitude', __('Longitude'))->icon('fa-free-code-camp');
                $form->text('latitude', __('Latitude'))->icon('fa-free-code-camp');
                // Form Latitude & Longitude using map yandex but not working if data more than one
                // $form->latlong('latitude', 'longitude', 'Latitude & Longitude')->height(400);
                $form->select('status_tempat_tinggal_id', __('Status Tempat Tinggal'))->options(Lookups::where('category', '=', 'Status Tempat Tinggal')->pluck('lookup_name', 'id'));
                $form->select('type_tempat_tinggal_id', __('Tipe Tempat Tinggal'))->options(Lookups::where('category', '=', 'Type Tempat Tinggal')->pluck('lookup_name', 'id'));
            });

        })->tab('Contact', function (Form $form) {
            $form->hasMany('contact', function (Form\NestedForm $form) {
                $form->hidden('u_id');
                $form->text('contact_value', __('Contact Value'))->icon('fa-free-code-camp')->rules('required');
                $form->select('type_contact_id', __('Tipe Kontak'))->options(Lookups::where('category', '=', 'Type Contact')->pluck('lookup_name', 'id'))->rules('required');
                $form->select('status_keaktifan_id', __('Status Keaktifan'))->options(Lookups::where('category', '=', 'Status Keaktifan')->pluck('lookup_name', 'id'));
            });

        })->tab('Identity', function (Form $form) {
            $form->hasMany('identity', function (Form\NestedForm $form) {
                $form->hidden('u_id');
                $form->select('category_identity_id', __('Identitas'))->options(Lookups::where('category', '=', 'Category Identity')->pluck('lookup_name', 'id'))->rules('required');
                $form->text('nomor_identity', __('Nomor Identitas'))->rules('regex:/^\d+$/', ['regex' => 'code must be numbers'])->icon('fa-free-code-camp')->rules('required');
                $form->date('masa_berlaku', __('Masa Berlaku'))->format('YYYY-MM-DD')->width('100');
                $form->select('status_data', __('Status Data'))->options(Lookups::where('category', '=', 'Status Verifikasi')->pluck('lookup_name', 'id'));
                $form->textarea('description', __('Deskripsi'))->rows(10);
            });

        })->tab('Bank Account', function (Form $form) {
            $form->hasMany('bank', function (Form\NestedForm $form) {
                $form->hidden('u_id');
                $form->select('nama_bank', __('Bank'))->options(MDMBank::all()->pluck('name', 'id'))->rules('required');
                $form->select('cabang', __('Cabang Bank'))->options(MDMCity::all()->pluck('name', 'id'))->rules('required');
                $form->text('nomor_rekening', __('Nomor Rekening'))->rules('required|regex:/^\d+$/', ['regex' => 'code must be numbers'])->icon('fa-free-code-camp');
                $form->text('atas_nama', __('Atas Nama'))->rules('required');
                $form->select('status_keaktifan_id', __('Status Keaktifan'))->options(Lookups::where('category', '=', 'Status Keaktifan')->pluck('lookup_name', 'id'));
                $form->select('status_data', __('Status Data'))->options(Lookups::where('category', '=', 'Status Verifikasi')->pluck('lookup_name', 'id'));
            });

        })->tab('Unit', function (Form $form) {
            $form->hidden('u_id');
            $form->hasMany('unit', __('Unit'), function (Form\NestedForm $form) {
                $form->select('unit_id', __('Unit'))->options(Lookups::where('category', '=', 'Unit')->pluck('lookup_name', 'id'))->rules('required');
                $form->select('status_keaktifan_id', __('Status Keaktifan'))->options(Lookups::where('category', '=', 'Status Keaktifan')->pluck('lookup_name', 'id'));
                $form->url('url_profile', __('Profile URL'));
            });

        })->tab('Attachment', function (Form $form) {
            $form->hasMany('attachment', function (Form\NestedForm $form) {
                $form->hidden('u_id');
                $form->file('filename', __('Filename'))->rules('mimes:doc,docx,xlsx,pdf');
                $form->select('type_file_id', __('Type File'))->options(Lookups::where('category', '=', 'Type File')->pluck('lookup_name', 'id'));
                $form->textarea('description', __('Deskripsi'))->rows(10);
            });

        })->tab('Relationship', function (Form $form) {
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
                $form->select('gender', __('Jenis Kelamin'))->options(Lookups::where('category', '=', 'Gender')->pluck('lookup_name', 'id'))->rules('required');
                $form->select('religion_id', __('Agama'))->options(Lookups::where('category', '=', 'Agama')->pluck('lookup_name', 'id'))->rules('required');
                $form->select('profesi_id', __('Profesi'))->options(Lookups::where('category', '=', 'Profesi')->pluck('lookup_name', 'id'));
                $form->select('status_kawin_id', __('Status Kawin'))->options(Lookups::where('category', '=', 'Status Kawin')->pluck('lookup_name', 'id'))->rules('required');
                $form->select('relationship_id', __('Hubungan Keluarga'))->options(Lookups::where('category', '=', 'Relationship')->pluck('lookup_name', 'id'))->rules('required');
                $form->select('category_identity_id', __('Identitas'))->options(Lookups::where('category', '=', 'Category Identity')->pluck('lookup_name', 'id'));
                $form->text('nomor_identity', __('Nomor Identitas'))->rules('regex:/^\d+$/|min:8', ['regex' => 'code must be numbers', 'min' => 'code can not be less than 8 characters'])->icon('fa-free-code-camp')->rules('required');
                $form->date('masa_berlaku', __('Masa Berlaku'))->format('YYYY-MM-DD')->width('100');
                $form->select('status_data', __('Status Data'))->options(Lookups::where('category', '=', 'Status Verifikasi')->pluck('lookup_name', 'id'));
            });
        });

        $form->saved(function (Form $form) {
            if (!empty($form->model()->id)) {
                admin_toastr('Save succeeded !', 'success');
                return redirect()->route('customer.index');
            }
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

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        session()->flash('edit_certified', true);
        return $this->formCertified()->update(Profile::where('u_id',$id)->pluck('id')->first());
    }
}
