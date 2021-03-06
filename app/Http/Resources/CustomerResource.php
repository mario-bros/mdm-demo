<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
 
class CustomerResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'u_id' => $this->u_id,
            'unit' => $this->unit,
            'customer_id' => $this->customer_id,
            'full_name' => $this->full_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'surname' => $this->surname,
            'nickname' => $this->nickname,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'pob' => $this->pob,
            'address' => $this->address,
            'nomor' => $this->nomor,
            'blok' => $this->blok,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'kelurahan' => $this->kelurahan,
            'kecamatan' => $this->kecamatan,
            'kota' => $this->kota,
            'propinsi' => $this->propinsi,
            'kodepos' => $this->kodepos,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'status_tempat_tinggal' => $this->status_tempat_tinggal,
            'type_tempat_tinggal' => $this->type_tempat_tinggal,
            'category_tempat_tinggal' => $this->category_tempat_tinggal,
            'email1' => $this->email1,
            'email2' => $this->email2,
            'telepon_rumah' => $this->telepon_rumah,
            'telepon_kantor' => $this->telepon_kantor,
            'fax' => $this->fax,
            'mobile_phone1' => $this->mobile_phone1,
            'mobile_phone2' => $this->mobile_phone2,
            'ktp' => $this->ktp,
            'suku' => $this->suku,
            'kewarganegaraan' => $this->kewarganegaraan,
            'negara' => $this->negara,
            'religion' => $this->religion,
            'pendidikan' => $this->pendidikan,
            'profesi' => $this->profesi,
            'golongan_darah' => $this->golongan_darah,
            'status_kawin' => $this->status_kawin,
            'mortalitas' => $this->mortalitas,
            'category_user' => $this->category_user,
            'status_keaktifan' => $this->status_keaktifan,
            'status_pengkinian_data' => $this->status_pengkinian_data,
            'product' => $this->product,
            'created_at' => $this->created_at,
            'flag_process' => $this->flag_process,
            'process_at' => $this->process_at,
            'category' => $this->category,
            'id_type' => $this->id_type,
            'home_address_2' => $this->home_address_2,
            'kode_pos' => $this->kode_pos,
            'home_country' => $this->home_country,
            'current_position' => $this->current_position,
            'annual_income' => $this->annual_income,
            'source_of_addl_income' => $this->source_of_addl_income,
            'additional_income' => $this->additional_income,
        ];
    }
}