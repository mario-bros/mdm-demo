<?php

namespace App\Admin\Controllers\Custom;

use App\Admin\GridCompare;
use App\Helpers\CompareHelper;

use App\Model\ProfileWeb;
use App\Model\MasterCompany;

use Encore\Admin\Grid;
use Encore\Admin\Layout\Row;

use App\Traits\CustomTraits;

use Encore\Admin\Widgets\Box;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

use App\Http\Controllers\Controller;



class CompareController extends Controller
{
    use CustomTraits;

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
        // dd(Session::get('user')->lookup_name);

        return Admin::content(function (Content $content) use ($id) {
            $content->header(' Compare ');
            $content->description(' Data Customer ');

            $body = $this->getFormGoldenRecord()->edit($id);
            // dd( debug_backtrace() );

            $golden = $this->getShowGolden($id);

            $unit = MasterCompany::where('id', \Admin::user()->unit_id)->pluck('id', 'id');
            foreach ($unit as $key => $name) {
                // Insert here if any logic
            }
            $content->row(function (Row $row) use ($content, $body, $name, $golden) {
                $row->column(1 / 2, new Box(__('Golden Record'), $golden));
                $row->column(1 / 2, new Box(__($name), $body));
                $row->column(1 / 2, new Box(__($name), $body));
            });
        });
    }

    public function goldenRecord($id)
    {
        /*try {
            
        } catch (\Throwable $th) {
            throw new \Exception("Business Unit class path not found");
        }*/

        $unitBrandNames = MasterCompany::pluck('brand_name', 'id')->toArray();

        $goldenRecord = ProfileWeb::where('u_id', $id)->first();
        if ( $goldenRecord === null ) {
            throw new \Exception("Golden Record ID invalid");
        }

        $grid = new GridCompare($goldenRecord);

        $grid->column('Unit')->display(function () use ($unitBrandNames) {
            if ($this->unit == strtoupper('golden record')) return $this->unit;
            return $unitBrandNames[$this->unit];

            // Otherwise it is displayed as editable
            // return $column->editable();
        });

        $grid->column('Customer ID')->display(function () {
            if ($this->unit == strtoupper('golden record')) return $this->uid_golden;
            return $this->customer_id;
        });

        $grid->column('Full Name')->display(function () use ($goldenRecord) {
            return (strtolower($this->full_name) == strtolower($goldenRecord->full_name)) ? CompareHelper::inputTextDisplay($this->full_name) : CompareHelper::inputTextDisplayWithErr($this->full_name);
        });

        $grid->column('Gender')->display(function () use ($goldenRecord) {
            return (strtolower($this->alias_gender) == strtolower($goldenRecord->alias_gender)) ? CompareHelper::inputTextDisplay($this->alias_gender) : CompareHelper::inputTextDisplayWithErr($this->alias_gender);
        });

        $grid->column('DOB')->display(function () use ($goldenRecord) {
            return ($this->dob == $goldenRecord->dob) ? CompareHelper::inputTextDisplay($this->dob) : CompareHelper::inputTextDisplayWithErr($this->dob);
        });

        $grid->column('POB')->display(function () use ($goldenRecord) {
            return (strtolower($this->pob) == strtolower($goldenRecord->pob)) ? CompareHelper::inputTextDisplay($this->pob) : CompareHelper::inputTextDisplayWithErr($this->pob);
        });

        $grid->column('Alamat')->display(function () use ($goldenRecord) {
            return (strtolower($this->address) == strtolower($goldenRecord->address)) ? CompareHelper::inputTextAreaDisplay($this->address) : CompareHelper::inputTextAreaDisplayWithErr($this->address);
        });

        $grid->column('Nomor / Blok')->display(function () use ($goldenRecord) {
            $inputBlocks = ($this->nomor == $goldenRecord->nomor) ? CompareHelper::inputTextDisplayShorten($this->nomor) : CompareHelper::inputTextDisplayShortenWithErr($this->nomor);
            $inputBlocks .= '<span>'. html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . '/'. html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . '</span>';
            $inputBlocks .= (strtolower($this->blok) == strtolower($goldenRecord->blok)) ? CompareHelper::inputTextDisplayShorten($this->blok) : CompareHelper::inputTextDisplayShortenWithErr($this->blok);

            return $inputBlocks;
        });

        $grid->column('RT / RW')->display(function () use ($goldenRecord) {
            $inputBlocks = ($this->rt == $goldenRecord->rt) ? CompareHelper::inputTextDisplayShorten($this->rt) : CompareHelper::inputTextDisplayShortenWithErr($this->rt);
            $inputBlocks .= '<span>'. html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . '/'. html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . '</span>';
            $inputBlocks .= ($this->rw == $goldenRecord->rw) ? CompareHelper::inputTextDisplayShorten($this->rw) : CompareHelper::inputTextDisplayShortenWithErr($this->rw);

            return $inputBlocks;
        });


        $grid->column('Kelurahan')->display(function () use ($goldenRecord) {
            if ($this->unit == strtoupper('golden record')) return CompareHelper::inputTextDisplay($this->alias_kelurahan);
            return (strtolower($this->kelurahan) == strtolower($goldenRecord->alias_kelurahan)) ? CompareHelper::inputTextDisplay($this->kelurahan) : CompareHelper::inputTextDisplayWithErr($this->kelurahan);
        });

        $grid->column('Kecamatan')->display(function () use ($goldenRecord) {
            if ($this->unit == strtoupper('golden record')) return CompareHelper::inputTextDisplay($this->alias_kecamatan);
            return (strtolower($this->kecamatan) == strtolower($goldenRecord->alias_kecamatan)) ? CompareHelper::inputTextDisplay($this->kecamatan) : CompareHelper::inputTextDisplayWithErr($this->kecamatan);
        });

        $grid->column('Kota')->display(function () use ($goldenRecord) {
            if ($this->unit == strtoupper('golden record')) return CompareHelper::inputTextDisplay($this->alias_kota);
            return (strtolower($this->kota) == strtolower($goldenRecord->alias_kota)) ? CompareHelper::inputTextDisplay($this->kota) : CompareHelper::inputTextDisplayWithErr($this->kota);
        });

        $grid->column('Propinsi')->display(function () use ($goldenRecord) {
            if ($this->unit == strtoupper('golden record')) return CompareHelper::inputTextDisplay($this->alias_propinsi);
            return (strtolower($this->propinsi) == strtolower($goldenRecord->alias_propinsi)) ? CompareHelper::inputTextDisplay($this->propinsi) : CompareHelper::inputTextDisplayWithErr($this->propinsi);
        });

        $grid->column('Kode Pos')->display(function () use ($goldenRecord) {
            return ($this->kodepos == $goldenRecord->kodepos) ? CompareHelper::inputTextDisplay($this->kodepos) : CompareHelper::inputTextDisplayWithErr($this->kodepos);
        });

        $grid->column('Status Tempat Tinggal')->display(function () use ($goldenRecord) {
            return (strtolower($this->alias_status_tempat_tinggal) == strtolower($goldenRecord->alias_status_tempat_tinggal)) ? CompareHelper::inputTextDisplay($this->alias_status_tempat_tinggal) : CompareHelper::inputTextDisplayWithErr($this->alias_status_tempat_tinggal);
        });

        $grid->column('Type Tempat Tinggal')->display(function () use ($goldenRecord) {
            return (strtolower($this->alias_type_tempat_tinggal) == strtolower($goldenRecord->alias_type_tempat_tinggal)) ? CompareHelper::inputTextDisplay($this->alias_type_tempat_tinggal) : CompareHelper::inputTextDisplayWithErr($this->alias_type_tempat_tinggal);
        });

        $grid->column('Kategori Tempat Tinggal')->display(function () use ($goldenRecord) {
            return (strtolower($this->alias_category_tempat_tinggal) == strtolower($goldenRecord->alias_category_tempat_tinggal)) ? CompareHelper::inputTextDisplay($this->alias_category_tempat_tinggal) : CompareHelper::inputTextDisplayWithErr($this->alias_category_tempat_tinggal);
        });

        $grid->column('Email 1')->display(function () use ($goldenRecord) {
            return (strtolower($this->email1) == strtolower($goldenRecord->email1)) ? CompareHelper::inputTextDisplay($this->email1) : CompareHelper::inputTextDisplayWithErr($this->email1);
        });

        $grid->column('Email 2')->display(function () use ($goldenRecord) {
            return (strtolower($this->email2) == strtolower($goldenRecord->email2)) ? CompareHelper::inputTextDisplay($this->email2) : CompareHelper::inputTextDisplayWithErr($this->email2);
        });

        $grid->column('Telpon Rumah / Kantor')->display(function () use ($goldenRecord) {
            $inputBlocks = (strtolower($this->telpon_rumah) == strtolower($goldenRecord->telpon_rumah)) ? CompareHelper::inputTextDisplayShorten($this->telpon_rumah) : CompareHelper::inputTextDisplayShortenWithErr($this->telpon_rumah);
            $inputBlocks .= '<span>'. html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . '/'. html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . '</span>';
            $inputBlocks .= (strtolower($this->telpon_kantor) == strtolower($goldenRecord->telpon_kantor)) ? CompareHelper::inputTextDisplayShorten($this->telpon_kantor) : CompareHelper::inputTextDisplayShortenWithErr($this->telpon_kantor);

            return $inputBlocks;
        });

        $grid->column('Fax')->display(function () use ($goldenRecord) {
            return ($this->fax == $goldenRecord->fax) ? CompareHelper::inputTextDisplay($this->fax) : CompareHelper::inputTextDisplayWithErr($this->fax);
        });

        $grid->column('Mobile Ph 1 / 2')->display(function () use ($goldenRecord) {
            $inputBlocks = ($this->mobile_phone1 == $goldenRecord->mobile_phone1) ? CompareHelper::inputTextDisplayShorten($this->mobile_phone1) : CompareHelper::inputTextDisplayShortenWithErr($this->mobile_phone1);
            $inputBlocks .= '<span>'. html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . '/'. html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . '</span>';
            $inputBlocks .= ($this->mobile_phone2 == $goldenRecord->mobile_phone2) ? CompareHelper::inputTextDisplayShorten($this->mobile_phone2) : CompareHelper::inputTextDisplayShortenWithErr($this->mobile_phone2);

            return $inputBlocks;
        });

        $grid->column('Tipe Identitas')->display(function () use ($goldenRecord) {
            if ($this->unit == strtoupper('golden record')) return CompareHelper::inputTextDisplay($this->alias_category_identity);
            return (strtolower($this->alias_id_type) == strtolower($goldenRecord->alias_category_identity)) ? CompareHelper::inputTextDisplay($this->alias_id_type) : CompareHelper::inputTextDisplayWithErr($this->alias_id_type);
        });

        $grid->column('No ID')->display(function () use ($goldenRecord) {
            return (strtolower($this->ktp) == strtolower($goldenRecord->ktp)) ? CompareHelper::inputTextDisplay($this->ktp) : CompareHelper::inputTextDisplayWithErr($this->ktp);
        });

        $grid->column('Suku')->display(function () use ($goldenRecord) {
            if ($this->unit == strtoupper('golden record')) return CompareHelper::inputTextDisplay($this->alias_suku);
            return (strtolower($this->suku) == strtolower($goldenRecord->alias_suku)) ? CompareHelper::inputTextDisplay($this->suku) : CompareHelper::inputTextDisplayWithErr($this->suku);
        });

        $grid->column('Kewarganegaraan')->display(function () use ($goldenRecord) {
            return (strtolower($this->alias_kewarganegaraan) == strtolower($goldenRecord->alias_kewarganegaraan)) ? CompareHelper::inputTextDisplay($this->alias_kewarganegaraan) : CompareHelper::inputTextDisplayWithErr($this->alias_kewarganegaraan);
        });

        $grid->column('Negara')->display(function () use ($goldenRecord) {
            if ($this->unit == strtoupper('golden record')) return CompareHelper::inputTextDisplay($this->alias_negara);
            return (strtolower($this->negara) == strtolower($goldenRecord->alias_negara)) ? CompareHelper::inputTextDisplay($this->negara) : CompareHelper::inputTextDisplayWithErr($this->negara);
        });

        $grid->column('Agama')->display(function () use ($goldenRecord) {
            if ($this->unit == strtoupper('golden record')) return CompareHelper::inputTextDisplay($this->alias_agama);
            return (strtolower($this->alias_religion) == strtolower($goldenRecord->alias_agama)) ? CompareHelper::inputTextDisplay($this->alias_religion) : CompareHelper::inputTextDisplayWithErr($this->alias_religion);
        });

        $grid->column('Pendidikan')->display(function () use ($goldenRecord) {
            if ($this->unit == strtoupper('golden record')) return CompareHelper::inputTextDisplay($this->alias_pendidikan);
            return (strtolower($this->pendidikan) == strtolower($goldenRecord->alias_pendidikan)) ? CompareHelper::inputTextDisplay($this->pendidikan) : CompareHelper::inputTextDisplayWithErr($this->pendidikan);
        });

        $grid->column('Profesi')->display(function () use ($goldenRecord) {
            return (strtolower($this->alias_profesi) == strtolower($goldenRecord->alias_profesi)) ? CompareHelper::inputTextDisplay($this->alias_profesi) : CompareHelper::inputTextDisplayWithErr($this->alias_profesi);
        });

        $grid->column('Golongan Darah')->display(function () use ($goldenRecord) {
            return (strtolower($this->alias_golongan_darah) == strtolower($goldenRecord->alias_golongan_darah)) ? CompareHelper::inputTextDisplay($this->alias_golongan_darah) : CompareHelper::inputTextDisplayWithErr($this->alias_golongan_darah);
        });

        $grid->column('Status Kawin')->display(function () use ($goldenRecord) {
            return (strtolower($this->alias_status_kawin) == strtolower($goldenRecord->alias_status_kawin)) ? CompareHelper::inputTextDisplay($this->alias_status_kawin) : CompareHelper::inputTextDisplayWithErr($this->alias_status_kawin);
        });

        $grid->column('Status Mortalitas')->display(function () use ($goldenRecord) {
            return (strtolower($this->mortalitas) == strtolower($goldenRecord->mortalitas)) ? CompareHelper::inputTextDisplay($this->mortalitas) : CompareHelper::inputTextDisplayWithErr($this->mortalitas);
        });

        $grid->column('Kategori User')->display(function () use ($goldenRecord) {
            if ($this->unit == strtoupper('golden record')) return CompareHelper::inputTextDisplay($this->alias_category_user);
            return (strtolower($this->category_user) == strtolower($goldenRecord->alias_category_user)) ? CompareHelper::inputTextDisplay($this->category_user) : CompareHelper::inputTextDisplayWithErr($this->category_user);
        });

        $grid->column('Status Keaktifan')->display(function () use ($goldenRecord) {
            if ($this->unit == strtoupper('golden record')) return CompareHelper::inputTextDisplay($this->alias_status_keaktifan);
            return (strtolower($this->status_keaktifan) == strtolower($goldenRecord->alias_status_keaktifan)) ? CompareHelper::inputTextDisplay($this->status_keaktifan) : CompareHelper::inputTextDisplayWithErr($this->status_keaktifan);
        });

        $grid->column('Latitude / Longitude')->display(function () use ($goldenRecord) {
            $inputBlocks = ($this->latitude == $goldenRecord->latitude) ? CompareHelper::inputTextDisplayShorten($this->latitude) : CompareHelper::inputTextDisplayShortenWithErr($this->latitude);
            $inputBlocks .= '<span>'. html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . '/'. html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . html_entity_decode('&nbsp;') . '</span>';
            $inputBlocks .= ($this->longitude == $goldenRecord->longitude) ? CompareHelper::inputTextDisplayShorten($this->longitude) : CompareHelper::inputTextDisplayShortenWithErr($this->longitude);

            return $inputBlocks;
        });

        $grid->disableRowSelector();
        $grid->disableTools();
        $grid->disableActions();

        return Admin::content(function (Content $content) use ($grid) {
            $content->header(' Compare ');
            $content->description(' Data Customer ');

            $content->row($grid);
        });
    }

    /**
     * Form interface.
     *
     * @return Content
     */
    public function getFormGoldenRecord()
    {
        // Insert data based on staging unit database
        // Session::put('lookup_name', Session::get('user')->lookup_name);

        // Get form insert
        $unit = $this->LoadFormGR();

        return $unit;

    }

    private function _getFormUnitClean($connectionUnit)
    {
        // Insert data based on staging unit database
        // Session::put('lookup_name', Session::get('user')->lookup_name);

        // Get form insert
        $unit = $this->LoadFormGRClean($connectionUnit);

        return $unit;

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
        return $this->getFormGoldenRecord()->update($id);
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
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function getShowGolden($id)
    {
        // Get uid from unit
        $body = $this->getFormGoldenRecord()->edit($id);

        // Session::put('lookup_name', 'pgsql');

        // Get data golden records
        // $goldenRecords = $this->LoadDetail($body);
        $goldenRecords = $this->LoadDetailGoldenRecord($body);
        

        return $goldenRecords;
    }
}
