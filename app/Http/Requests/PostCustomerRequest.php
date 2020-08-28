<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use App\Model\Lookups\MDMCity;
use App\Model\Lookups\MDMVillage;
use App\Model\Lookups\MDMDistrict;
use App\Model\Lookups\MDMProvince;
use App\Model\Lookups\MDMBank;
use App\Model\Lookups;

class PostCustomerRequest extends FormRequest
{

    protected function failedValidation( \Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = (new \Illuminate\Validation\ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $unitConn = $this->get('unit');
        $rules = [
            'unit' => 'required|in:INSU,MKAP,ASET,BANK,MVN,LIFE,SPIN,STAR,VISI,SNDO,LEAS,FINA,SEKU,INSU,PLAY,KVIS,VPLS,ROOV,MNIE,MNCA,RPLS,TFTH,MCON,INFO,OKEZ,MSSO,MRAD',
            'customer_id' => 'required|unique:' . $unitConn . '.mdm_staging_customer_profile|max:50',
            'full_name' => 'max:250',
            'first_name' => 'max:100',
            'middle_name' => 'max:100',
            'last_name' => 'max:100',
            'surname' => 'max:50',
            'nickname' => 'max:50',
            'gender' => 'max:50',
            'dob' => 'date_format:Y-m-d|nullable',
            'pob' => 'max:50',
            'address' => 'max:250',
            'nomor' => 'max:10',
            'blok' => 'max:10',
            'rt' => 'max:10',
            'rw' => 'max:10',
            'kelurahan' => 'max:50',
            'kecamatan' => 'max:50',
            'kota' => 'max:50',
            'propinsi' => 'max:50',
            'kodepos' => 'max:10',
            'longitude' => 'max:50',
            'latitude' => 'max:50',
            'status_tempat_tinggal' => 'max:50',
            'type_tempat_tinggal' => 'max:50',
            'category_tempat_tinggal' => 'max:50',
            'email1' => 'max:100',
            'email2' => 'max:100',
            'telepon_rumah' => 'max:50',
            'telepon_kantor' => 'max:50',
            'fax' => 'max:50',
            'mobile_phone1' => 'max:50',
            'mobile_phone2' => 'max:50',
            'ktp' => 'max:50',
            'kewarganegaraan' => 'max:50',
            'negara' => 'max:50',
            'religion' => 'max:50',
            'pendidikan' => 'max:50',
            'profesi' => 'max:50',
            'golongan_darah' => 'max:10',
            'status_kawin' => 'max:50',
            'mortalitas' => 'max:50',
            'category_user' => 'max:50',
            'status_keaktifan' => 'max:50',
            'status_pengkinian_data' => 'max:50',
            'product' => 'max:2000',
            'category' => 'max:50',
            'id_type' => 'max:50',
            'home_address_2' => 'max:250',
            'kode_pos' => 'max:10',
            'home_country' => 'max:50',
            'current_position' => 'max:100',
            'annual_income' => 'max:50',
            'source_of_addl_income' => 'max:50',
            'additional_income' => 'max:50'
        ];

        return $rules;
    }

    public function formatInput()
    {
        $input = $this->_array_map_recursive('trim', $this->all());

        if ($input['spouse_date_of_birth'] == '' || $input['spouse_date_of_birth'] === NULL) {
            unset($input['spouse_date_of_birth']);
        }

        if ($input['dob'] == '' || $input['dob'] === NULL) {
            unset($input['dob']);
        }

        $exceptionKeys = ['_token'];
        $sanitizedInputs = array_diff_key($input, array_flip($exceptionKeys));
        // dd($sanitizedInputs);

        $this->replace($sanitizedInputs);
        return $this->all();
    }

    public function formatInputToJsonPayload()
    {
        $input = $this->_array_map_recursive('trim', $this->all());

        if ($this->has('pob') && $this->pob != "") 
            $input['pob'] = MDMCity::find($this->pob)->name;

        if ($this->has('suku') && $this->suku != "")
            $input['suku'] = Lookups::find($this->suku)->lookup_name;

        if ($this->has('kewarganegaraan') && $this->kewarganegaraan != "")
            $input['kewarganegaraan'] = Lookups::find($this->kewarganegaraan)->lookup_name;

        if ($this->has('negara') && $this->negara != "")
            $input['negara'] = Lookups::find($this->negara)->lookup_name;

        if ($this->has('negara') && $this->negara != "")
            $input['negara'] = Lookups::find($this->negara)->lookup_name;

        if ($this->has('religion') && $this->religion != "")
            $input['religion'] = Lookups::find($this->religion)->lookup_name;

        if ($this->has('pendidikan') && $this->pendidikan != "")
            $input['pendidikan'] = Lookups::find($this->pendidikan)->lookup_name;

        if ($this->has('profesi') && $this->profesi != "")
            $input['profesi'] = Lookups::find($this->profesi)->lookup_name;

        if ($this->has('golongan_darah') && $this->golongan_darah != "")
            $input['golongan_darah'] = Lookups::find($this->golongan_darah)->lookup_name;

        if ($this->has('status_kawin') && $this->status_kawin != "")
            $input['status_kawin'] = Lookups::find($this->status_kawin)->lookup_name;

        if ($this->has('mortalitas') && $this->mortalitas != "")
            $input['mortalitas'] = Lookups::find($this->mortalitas)->lookup_name;

        if ($this->has('status_keaktifan') && $this->status_keaktifan != "")
            $input['status_keaktifan'] = Lookups::find($this->status_keaktifan)->lookup_name;

        if ($this->has('status_pengkinian_data') && $this->status_pengkinian_data != "")
            $input['status_pengkinian_data'] = Lookups::find($this->status_pengkinian_data)->lookup_name;

        if ($this->has('category_user') && $this->category_user != "")
            $input['category_user'] = Lookups::find($this->category_user)->lookup_name;

        if ($this->has('address') && ! empty($this->address) ) {

            foreach ($input['address'] as $idx => $val ) {
                // dd($val);
                if ( $val['_remove_'] == 0 ) {

                    unset($input['address'][$idx]['id']);
                    unset($input['address'][$idx]['_remove_']);

                    if ( $val['kelurahan'] != "" ) 
                        $input['address'][$idx]['kelurahan'] = MDMVillage::find($val['kelurahan'])->name;
    
                    if ( $val['kecamatan'] != "" )
                        $input['address'][$idx]['kecamatan'] = MDMDistrict::find($val['kecamatan'])->name;
    
                    if ( $val['kota'] != "" )
                        $input['address'][$idx]['kota'] = MDMCity::find($val['kota'])->name;
                    
                    if ( $val['propinsi'] != "" )
                        $input['address'][$idx]['propinsi'] = MDMProvince::find($val['propinsi'])->name;
    
                    if ( $val['status_tempat_tinggal'] != "" )
                        $input['address'][$idx]['status_tempat_tinggal'] = Lookups::find($val['status_tempat_tinggal'])->lookup_name;
    
                    if ( $val['type_tempat_tinggal'] != "" )
                        $input['address'][$idx]['type_tempat_tinggal'] = Lookups::find($val['type_tempat_tinggal'])->lookup_name;
    
                    if ( $val['category_tempat_tinggal'] != "" )
                        $input['address'][$idx]['category_tempat_tinggal'] = Lookups::find($val['category_tempat_tinggal'])->lookup_name;
    
                    if ( $val['status_keaktifan'] != "" )
                        $input['address'][$idx]['status_keaktifan'] = Lookups::find($val['status_keaktifan'])->lookup_name;
    
                    if ( $val['status_data'] != "" )
                        $input['address'][$idx]['status_data'] = Lookups::find($val['status_data'])->lookup_name;
                }
            }
        }

        if ($this->has('contact') && ! empty($this->contact) ) {

            foreach ($input['contact'] as $idx => $val ) {
                if ( $val['_remove_'] == 0 ) {

                    unset($input['contact'][$idx]['id']);
                    unset($input['contact'][$idx]['_remove_']);

                    if ( $val['type_contact'] != "" )
                        $input['contact'][$idx]['type_contact'] = Lookups::find($val['type_contact'])->lookup_name;
    
                    if ( $val['status_keaktifan'] != "" )
                        $input['contact'][$idx]['status_keaktifan'] = Lookups::find($val['status_keaktifan'])->lookup_name;
    
                    if ( $val['status_verifikasi'] != "" )
                        $input['contact'][$idx]['status_verifikasi'] = Lookups::find($val['status_verifikasi'])->lookup_name;
    
                    if ( $val['status_data'] != "" )
                        $input['contact'][$idx]['status_data'] = Lookups::find($val['status_data'])->lookup_name;
                }
            }
        }

        if ($this->has('identity') && ! empty($this->identity) ) {

            foreach ($input['identity'] as $idx => $val ) {
                if ( $val['_remove_'] == 0 ) {

                    unset($input['identity'][$idx]['id']);
                    unset($input['identity'][$idx]['_remove_']);

                    if ( $val['category_identity'] != "" )
                        $input['identity'][$idx]['category_identity'] = Lookups::find($val['category_identity'])->lookup_name;
    
                    if ( $val['status_data'] != "" )
                        $input['identity'][$idx]['status_data'] = Lookups::find($val['status_data'])->lookup_name;
                }
            }
        }

        if ($this->has('bank') && ! empty($this->bank) ) {

            foreach ($input['bank'] as $idx => $val ) {
                if ( $val['_remove_'] == 0 ) {

                    unset($input['bank'][$idx]['id']);
                    unset($input['bank'][$idx]['_remove_']);

                    if ( $val['nama_bank'] != "" )
                        $input['bank'][$idx]['nama_bank'] = MDMBank::find($val['nama_bank'])->name;

                    if ( $val['cabang'] != "" )
                        $input['bank'][$idx]['cabang'] = MDMCity::find($val['cabang'])->name;

                    if ( $val['status_keaktifan'] != "" )
                        $input['bank'][$idx]['status_keaktifan'] = Lookups::find($val['status_keaktifan'])->lookup_name;
    
                    if ( $val['status_data'] != "" )
                        $input['bank'][$idx]['status_data'] = Lookups::find($val['status_data'])->lookup_name;
                }
            }
        }

        if ($this->has('unit') && ! empty($this->unit) ) {

            foreach ($input['unit'] as $idx => $val ) {
                if ( $val['_remove_'] == 0 ) {

                    unset($input['unit'][$idx]['id']);
                    unset($input['unit'][$idx]['_remove_']);

                    if ( $val['unit'] != "" )
                        $input['unit'][$idx]['unit'] = Lookups::find($val['unit'])->lookup_name;

                    if ( $val['status_keaktifan'] != "" )
                        $input['unit'][$idx]['status_keaktifan'] = Lookups::find($val['status_keaktifan'])->lookup_name;
                }
            }
        }

        $input['created_by'] = 1;

        $exceptionKeys = ['_token', 'submit'];
        $sanitizedInputs = array_diff_key($input, array_flip($exceptionKeys));

        $this->replace($sanitizedInputs);
        return $this->all();
    }

    private function _array_map_recursive($callback, $array)
    {
        $func = function ($item) use (&$func, &$callback) {
            return is_array($item) ? array_map($func, $item) : call_user_func($callback, $item);
        };

        return array_map($func, $array);
    }
}
