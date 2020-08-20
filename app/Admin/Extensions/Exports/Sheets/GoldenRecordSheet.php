<?php

Namespace App\Admin\Extensions\Exports\Sheets;

// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\View\View;
use App\Admin\Grid\Exporters\ViewExporter;
use App\Model\ProfileWeb;

use Maatwebsite\Excel\Concerns\WithTitle;
use App\Helpers\Helper;

class GoldenRecordSheet extends ViewExporter implements WithTitle
{
    protected $u_id = '';
    protected $uid_golden = '';
    const TITLE_CONTENT_PREFIX = 'ID Golden ';

    public function __construct(string $u_id='', string $uid_golden='')
    {
        $this->u_id = $u_id;
        $this->uid_golden = $uid_golden;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this::TITLE_CONTENT_PREFIX . $this->uid_golden;
    }

    public function view(): View
    {
        $profileData = ProfileWeb::query()
                ->select(
                        'u_id', 
                        'uid_golden', 
                        'unit', 
                        'customer_id', 
                        'full_name', 
                        'gender', 
                        'dob', 
                        'pob', 
                        'kota_id', 
                        'address', 
                        'kelurahan_id', 
                        'kecamatan_id', 
                        'propinsi_id', 
                        'kodepos', 
                        'status_tempat_tinggal_id', 
                        'type_tempat_tinggal_id', 
                        'category_tempat_tinggal_id',
                        'email1', 
                        'email2', 
                        'telepon_rumah', 
                        'telepon_kantor', 
                        'fax', 
                        'mobile_phone1', 
                        'mobile_phone2', 
                        'category_identity_id', 
                        'ktp', 
                        'kewarganegaraan_id', 
                        'religion_id', 
                        'profesi_id', 
                        'golongan_darah_id', 
                        'status_kawin_id'
                    )
                ->where('u_id', $this->u_id)
                ->firstOrFail();

        $arrCollection = [$profileData];
        $profileWebCollection = collect($arrCollection);
        // dd($profileWebCollection);

        $businessUnits = $profileData->businessUnits()->get();
        $relatedBusinessUnits = [];
        foreach ($businessUnits as $row) {
            $businessUnitProfileInstance = Helper::businessUnitInstanceByUnit($row->unit);
            $businessUnitProfileInstance = $businessUnitProfileInstance->find($row->u_id);
            $logo = '';
            if (file_exists( base_path('public/uploads/images/' . strtoupper($businessUnitProfileInstance->unit) . '/logo.png') )) {
                $logo = base_path('public/uploads/images/' . strtoupper($businessUnitProfileInstance->unit) . '/logo.png');
            }
            $businessUnitProfileInstance->logo = $logo;

            $relatedBusinessUnits[] = $businessUnitProfileInstance;
        }
        $businessUnitsCollection = collect($relatedBusinessUnits);

        return view('vendor.admin.exports.sheets.customer', [
            'profiles' => $profileWebCollection,
            'business_units' => $businessUnitsCollection
        ]);
    }
}