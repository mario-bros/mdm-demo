<?php

namespace App\Traits;

trait MaskingTraits
{
    public function getMaskingFullNameAttribute() 
    {
        return $this->maskingValue($this->full_name);
    }

    public function getMaskingFirstNameAttribute() 
    {
        return $this->maskingValue($this->first_name);
    }

    public function getMaskingMiddleNameAttribute() 
    {
        return $this->maskingValue($this->middle_name);
    }

    public function getMaskingLastNameAttribute() 
    {
        return $this->maskingValue($this->last_name);
    }

    public function getMaskingSurnameAttribute() 
    {
        return $this->maskingValue($this->surname);
    }

    public function getMaskingNicknameAttribute() 
    {
        return $this->maskingValue($this->nickname);
    }

    public function getMaskingPobAttribute() 
    {
        return $this->maskingValue($this->pob);
    }

    public function getMaskingAddressAttribute() 
    {
        return $this->maskingValue($this->address);
    }

    public function getMaskingNomorAttribute() 
    {
        return $this->maskingValue($this->nomor);
    }

    public function getMaskingBlokAttribute() 
    {
        return $this->maskingValue($this->blok);
    }

    public function getMaskingRtAttribute() 
    {
        return $this->maskingValue($this->rt);
    }

    public function getMaskingRwAttribute() 
    {
        return $this->maskingValue($this->rw);
    }

    public function getMaskingKelurahanAttribute() 
    {
        return $this->maskingValue($this->kelurahan);
    }

    public function getMaskingKecamatanAttribute() 
    {
        return $this->maskingValue($this->kecamatan);
    }

    public function getMaskingKodeposAttribute() 
    {
        return $this->maskingValue($this->kodepos);
    }

    public function getMaskingLongitudeAttribute() 
    {
        return $this->maskingValue($this->longitude);
    }

    public function getMaskingLatitudeAttribute() 
    {
        return $this->maskingValue($this->latitude);
    }

    public function getMaskingStatusTempatTinggalAttribute() 
    {
        return $this->maskingValue($this->status_tempat_tinggal);
    }

    public function getMaskingTypeTempatTinggalAttribute() 
    {
        return $this->maskingValue($this->type_tempat_tinggal);
    }

    public function getMaskingCategoryTempatTinggalAttribute() 
    {
        return $this->maskingValue($this->category_tempat_tinggal);
    }

    public function getMaskingEmail1Attribute() 
    {
        return $this->maskingValue($this->email1);
    }

    public function getMaskingEmail2Attribute() 
    {
        return $this->maskingValue($this->email2);
    }

    public function getMaskingTeleponRumahAttribute() 
    {
        return $this->maskingValue($this->telepon_rumah);
    }

    public function getMaskingTeleponKantorAttribute() 
    {
        return $this->maskingValue($this->telepon_kantor);
    }

    public function getMaskingFaxAttribute() 
    {
        return $this->maskingValue($this->fax);
    }

    public function getMaskingMobilePhone1Attribute() 
    {
        return $this->maskingValue($this->mobile_phone1);
    }

    public function getMaskingMobilePhone2Attribute() 
    {
        return $this->maskingValue($this->mobile_phone2);
    }

    public function getMaskingKtpAttribute() 
    {
        return $this->maskingValue($this->ktp);
    }

    public function getMaskingSukuAttribute() 
    {
        return $this->maskingValue($this->suku);
    }

    public function getMaskingKewarganegaraanAttribute() 
    {
        return $this->maskingValue($this->kewarganegaraan);
    }

    public function getMaskingNegaraAttribute() 
    {
        return $this->maskingValue($this->negara);
    }

    public function getMaskingReligionAttribute() 
    {
        return $this->maskingValue($this->religion);
    }

    public function getMaskingPendidikanAttribute() 
    {
        return $this->maskingValue($this->pendidikan);
    }

    public function getMaskingProfesiAttribute() 
    {
        return $this->maskingValue($this->profesi);
    }

    public function getMaskingGolonganDarahAttribute() 
    {
        return $this->maskingValue($this->golongan_darah);
    }

    public function getMaskingStatusKawinAttribute() 
    {
        return $this->maskingValue($this->status_kawin);
    }

    public function getMaskingMortalitasAttribute() 
    {
        return $this->maskingValue($this->mortalitas);
    }

    public function getMaskingCategoryUserAttribute() 
    {
        return $this->maskingValue($this->category_user);
    }

    public function getMaskingProductAttribute() 
    {
        return $this->maskingValue($this->product);
    }

    public function getMaskingCategoryAttribute() 
    {
        return $this->maskingValue($this->category);
    }

    public function getMaskingHomeAddress2Attribute() 
    {
        return $this->maskingValue($this->home_address_2);
    }

    protected function maskingValue($stringVal) 
    {
        $arrVal = str_split($stringVal, 1);

        $func = function($value) {
            $vowelLetters = ['a', 'i', 'u', 'e', 'o'];
            if (in_array( strtolower($value), $vowelLetters ))
                return 'Z';
            elseif ( $value == ' ' || $value == '')
                return $value;
            else 
                return 'B';
        };

        $mapVal = array_map($func, $arrVal);
        return implode("", $mapVal);
    }
}