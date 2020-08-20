<?php

namespace App\Traits;

use App\Helpers\Helper;
use App\Model\Lookups;
use App\Model\Lookups\BusinessUnits\Sekuritas\MDMCitySekuritas;
use App\Model\Lookups\BusinessUnits\Sekuritas\MDMProvinceSekuritas;

trait BusinessUnitAliasTraits
{
    public function getAliasGenderAttribute()
    {
        $lookupsArr = Helper::getBusinessUnitsLookups();
        return Lookups::getCaptionByLookupNameUnit($lookupsArr, $this->gender, 'GENDER', $this->unit);
    }

    public function getAliasStatusTempatTinggalAttribute()
    {
        $lookupsArr = Helper::getBusinessUnitsLookups();
        return Lookups::getCaptionByLookupNameUnit($lookupsArr, $this->status_tempat_tinggal, 'STATUS_TEMPAT_TINGGAL', $this->unit);
    }

    public function getAliasTypeTempatTinggalAttribute()
    {
        $lookupsArr = Helper::getBusinessUnitsLookups();
        return Lookups::getCaptionByLookupNameUnit($lookupsArr, $this->type_tempat_tinggal, 'TYPE TEMPAT TINGGAL', $this->unit);
    }

    public function getAliasCategoryTempatTinggalAttribute()
    {
        $lookupsArr = Helper::getBusinessUnitsLookups();
        return Lookups::getCaptionByLookupNameUnit($lookupsArr, $this->category_tempat_tinggal, 'CATEGORY TEMPAT TINGGAL', $this->unit);
    }

    public function getAliasIdTypeAttribute()
    {
        $lookupsArr = Helper::getBusinessUnitsLookups();
        return Lookups::getCaptionByLookupNameUnit($lookupsArr, $this->id_type, 'ID_TYPE', $this->unit);
    }

    public function getAliasKewarganegaraanAttribute()
    {
        $lookupsArr = Helper::getBusinessUnitsLookups();
        return Lookups::getCaptionByLookupNameUnit($lookupsArr, $this->kewarganegaraan, 'KEWARGANEGARAAN', $this->unit);
    }

    public function getAliasReligionAttribute()
    {
        $lookupsArr = Helper::getBusinessUnitsLookups();
        return Lookups::getCaptionByLookupNameUnit($lookupsArr, $this->religion, 'RELIGION', $this->unit);
    }

    public function getAliasProfesiAttribute()
    {
        $lookupsArr = Helper::getBusinessUnitsLookups();
        return Lookups::getCaptionByLookupNameUnit($lookupsArr, $this->profesi, 'PROFESI', $this->unit);
    }

    public function getAliasGolonganDarahAttribute()
    {
        $lookupsArr = Helper::getBusinessUnitsLookups();
        return Lookups::getCaptionByLookupNameUnit($lookupsArr, $this->golongan_darah, 'GOLONGAN DARAH', $this->unit);
    }

    public function getAliasStatusKawinAttribute()
    {
        $lookupsArr = Helper::getBusinessUnitsLookups();
        return Lookups::getCaptionByLookupNameUnit($lookupsArr, $this->status_kawin, 'STATUS_KAWIN', $this->unit);
    }
}