<?php

Namespace App\Admin\Extensions\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

use Encore\Admin\Grid\Exporters\AbstractExporter;
use Encore\Admin\Facades\Admin;

use App\Admin\Grid\Exporters\ViewExporter;
use App\Admin\Extensions\Exports\Sheets\GoldenRecordSheet;

use App\Helpers\Helper;

use App\Model\ProfileWeb;
use App\Model\Lookups;
use App\Model\MasterCompany;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;


class GoldenRecordExport extends ViewExporter
{
    use Exportable;

    protected $params = [];

    public function __construct(array $params=[])
    {
        $this->params = $params;
    }

    public function setParams(array $params = []) 
    {
        $this->params = $params;
    }

    public function setFileName(string $name)
    {
        $this->fileName = $name;
    }

    public function view(): View
    {
        $unitBrandNames = MasterCompany::pluck('brand_name', 'id');
        if ( ! empty($this->params['per_page'])) {
            $defaultPerPage = $this->params['per_page'];
            if ($defaultPerPage > 100) {
                $defaultPerPage = 100;
            }

        } else
            $defaultPerPage = 20;

        $exportData = ProfileWeb::query()
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
                    ->where('golden', 'Y')
                    ->orderBy('id')
                    ->skip(0)->take($defaultPerPage);

        $relatedBusinessUnits = [];
        $lookupsArr = Helper::getBusinessUnitsLookups();

        $selectedRowsMode = strpos($this->params['_export_'], 'selected');
        if ($selectedRowsMode !== false) {
            $exportSegments = explode(':', $this->params['_export_']);
            $IDsSegment = $exportSegments[1];
            $IDArr = explode(',', $IDsSegment);
            $exportData = $exportData->whereIn('id', $IDArr);
            $profileWebCollection = $exportData->get();

            foreach ($profileWebCollection as $profileData) {
                $businessUnits = $profileData->businessUnits()->get();    
                foreach ($businessUnits as $row) {
                    $businessUnitProfileInstance = Helper::businessUnitInstanceByUnit($row->unit);
                    $businessUnitProfileInstance = $businessUnitProfileInstance->find($row->u_id);
                    $relatedBusinessUnits[$profileData->u_id][] = $businessUnitProfileInstance;
                }
            }
            $businessUnitsCollection = collect($relatedBusinessUnits);
            // dd($businessUnitsCollection);

            return view('vendor.admin.exports.customer', [
                'profiles' => $profileWebCollection,
                'business_units' => $businessUnitsCollection,
                'unit_brand_names' => $unitBrandNames,
                'lookups_collection' => $lookupsArr
            ]);
        }

        $fullNameParam = $this->params['full_name'];
        $customerIDParam = $this->params['customer_id'];
        $DOBStartDateParam = $this->params['dob']['start'];
        $DOBEndDateParam = $this->params['dob']['end'];
        $email1Param = $this->params['email1'];
        $kotaParam = $this->params['kota_id'];

        if ( Admin::user()->inRoles(['holding', 'moderator', 'administrator'])) {
            $unitParam = $this->params['unit'];
        } else {
            $unitParam = Session::get('unit_name');
        }

        if ($fullNameParam != '')
            $exportData = $exportData->where('full_name', 'LIKE', '%' . $fullNameParam . '%');

        if ($customerIDParam != '')
            $exportData = $exportData->where('customer_id', 'LIKE', '%' . $customerIDParam . '%');

        if ($DOBStartDateParam != '' && $DOBEndDateParam != '')
            $exportData = $exportData->whereBetween('dob', [$DOBStartDateParam, $DOBEndDateParam]);

        if ($email1Param != '')
            $exportData = $exportData->where('email1', 'LIKE', '%' . $email1Param . '%');

        if ($kotaParam != '') {
            $exportData = $exportData->where('kota_id', $kotaParam);
        }

        if ($unitParam != '')
            $exportData = $exportData->where('unit',  $unitParam);

        if ( ! empty($this->params['cursor']) ) {
            // Not the First Page of results
            $decodedCursor = json_decode(base64_decode($this->params['cursor']));
            $pageDirection = $decodedCursor->direction;

            if ( $pageDirection == 'desc' ) {
                unset($this->params['_export_']);
                unset($this->params['cursor']);
                $this->params['_page'] = (int) $decodedCursor->page;
                $pageKey = base64_encode(json_encode($this->params));
                $keyBorders = session($pageKey);

                $bottomBorderID = $keyBorders['first_id'];
                $upperBorderID = $keyBorders['last_id'];

                $exportData = $exportData
                                ->where('id', '>=', $bottomBorderID)
                                ->where('id', '<=', $upperBorderID);

                $profileWebCollection = $exportData->get();

            } else {
                // Page From Next button
                $bottomBorderID = $decodedCursor->id;
                $exportData = $exportData
                                ->where('id', '>', $bottomBorderID);

                $profileWebCollection = $exportData->get();
            }

        } else {
            // First Page of results
            $profileWebCollection = $exportData->get();
        }

        foreach ($profileWebCollection as $profileData) {
            $businessUnits = $profileData->businessUnits()->get();
            foreach ($businessUnits as $row) {
                $businessUnitProfileInstance = Helper::businessUnitInstanceByUnit($row->unit);
                try {
                    $businessUnitProfileInstance = $businessUnitProfileInstance->find($row->u_id);
                } catch(\Illuminate\Database\QueryException $ex){ 
                    // dd($businessUnitProfileInstance);
                    // dd($row->unit);
                    dd($ex->getMessage()); 
                }
                
                $relatedBusinessUnits[$profileData->u_id][] = $businessUnitProfileInstance;
            }
        }
        $businessUnitsCollection = collect($relatedBusinessUnits);

        return view('vendor.admin.exports.customer', [
            'profiles' => $profileWebCollection,
            'business_units' => $businessUnitsCollection,
            'unit_brand_names' => $unitBrandNames,
            'lookups_collection' => $lookupsArr
        ]);
    }
}