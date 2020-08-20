@inject('lookups', 'App\Model\Lookups')
@inject('cityLookup', 'App\Model\Lookups\MDMCity')
@inject('villageLookup', 'App\Model\Lookups\MDMVillage')
@inject('districtLookup', 'App\Model\Lookups\MDMDistrict')
@inject('provinceLookup', 'App\Model\Lookups\MDMProvince')


@foreach($profiles as $customerGoldenRecord)
    <h4>Golden Record</h4>
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid black">Unit</th>
                <th style="border: 1px solid black">Golden Record ID</th>
                <th style="border: 1px solid black">Full Name</th>
                <th style="border: 1px solid black">Gender</th>
                <th style="border: 1px solid black">Tgl Lahir</th>
                <th style="border: 1px solid black">Tempat Lahir</th>
                <th style="border: 1px solid black">Alamat</th>
                <th style="border: 1px solid black">Kelurahan</th>
                <th style="border: 1px solid black">Kecamatan</th>
                <th style="border: 1px solid black">Propinsi</th>
                <th style="border: 1px solid black">Kode Pos</th>
                <th style="border: 1px solid black">Status Tempat Tinggal</th>
                <th style="border: 1px solid black">Tipe Tempat Tinggal</th>
                <th style="border: 1px solid black">Kategori Tempat Tinggal</th>
                <th style="border: 1px solid black">Email 1</th>
                <th style="border: 1px solid black">Email 2</th>
                <th style="border: 1px solid black">Telepon Rumah</th>
                <th style="border: 1px solid black">Telepon Kantor</th>
                <th style="border: 1px solid black">Fax</th>
                <th style="border: 1px solid black">Mobile Phone 1</th>
                <th style="border: 1px solid black">Mobile Phone 2</th>
                <th style="border: 1px solid black">Kategori Identitas</th>
                <th style="border: 1px solid black">No Identitas</th>
                <th style="border: 1px solid black">Kewarganegaraan</th>
                <th style="border: 1px solid black">Agama</th>
                <th style="border: 1px solid black">Profesi</th>
                <th style="border: 1px solid black">Golongan Darah</th>
                <th style="border: 1px solid black">Status Nikah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: right">{{ $unit_brand_names[$customerGoldenRecord->unit] }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->uid_golden }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->full_name }}</td>
                <td style="text-align: right">{{ $lookups->getNameById($customerGoldenRecord->gender) }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->dob }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->pob }}</td>
                <td style="text-align: left">{{ $customerGoldenRecord->address }}</td>
                <td style="text-align: right">{{ $villageLookup->getNameById($customerGoldenRecord->kelurahan_id) }}</td>
                <td style="text-align: right">{{ $districtLookup->getNameById($customerGoldenRecord->kecamatan_id) }}</td>
                <td style="text-align: right">{{ $provinceLookup->getNameById($customerGoldenRecord->propinsi_id) }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->kodepos }}</td>
                <td style="text-align: right">{{ $lookups->getNameById($customerGoldenRecord->status_tempat_tinggal_id) }}</td>
                <td style="text-align: right">{{ $lookups->getNameById($customerGoldenRecord->type_tempat_tinggal_id) }}</td>
                <td style="text-align: right">{{ $lookups->getNameById($customerGoldenRecord->category_tempat_tinggal_id) }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->email1 }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->email2 }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->telepon_rumah }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->telepon_kantor }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->fax }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->mobile_phone1 }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->mobile_phone2 }}</td>
                <td style="text-align: right">{{ $lookups->getNameById($customerGoldenRecord->category_identity_id) }}</td>
                <td style="text-align: right">{{ $customerGoldenRecord->getFormattedIdentityNo() }}</td>
                <td style="text-align: right">{{ $lookups->getNameById($customerGoldenRecord->kewarganegaraan_id) }}</td>
                <td style="text-align: right">{{ $lookups->getNameById($customerGoldenRecord->religion_id) }}</td>
                <td style="text-align: right">{{ $lookups->getNameById($customerGoldenRecord->profesi_id) }}</td>
                <td style="text-align: right">{{ $lookups->getNameById($customerGoldenRecord->golongan_darah_id) }}</td>
                <td style="text-align: right">{{ $lookups->getNameById($customerGoldenRecord->status_kawin_id) }}</td>
            </tr>
        
        </tbody>
    </table>

    <p>Sebaran Bisnis Unit</p>
    @forelse($business_units[$customerGoldenRecord->u_id] as $BUCustomerProfile)
        @if ($BUCustomerProfile)
            <table>
                <thead>
                    <tr>
                        <th style="border: 1px solid black">Unit</th>
                        <th style="border: 1px solid black">Customer ID</th>
                        <th style="border: 1px solid black">Full Name</th>
                        <th style="border: 1px solid black">Gender</th>
                        <th style="border: 1px solid black">Tgl Lahir</th>
                        <th style="border: 1px solid black">Tempat Lahir</th>
                        <th style="border: 1px solid black">Alamat</th>
                        <th style="border: 1px solid black">Kelurahan</th>
                        <th style="border: 1px solid black">Kecamatan</th>
                        <th style="border: 1px solid black">Propinsi</th>
                        <th style="border: 1px solid black">Kode Pos</th>
                        <th style="border: 1px solid black">Status Tempat Tinggal</th>
                        <th style="border: 1px solid black">Tipe Tempat Tinggal</th>
                        <th style="border: 1px solid black">Kategori Tempat Tinggal</th>
                        <th style="border: 1px solid black">Email 1</th>
                        <th style="border: 1px solid black">Email 2</th>
                        <th style="border: 1px solid black">Telepon Rumah</th>
                        <th style="border: 1px solid black">Telepon Kantor</th>
                        <th style="border: 1px solid black">Fax</th>
                        <th style="border: 1px solid black">Mobile Phone 1</th>
                        <th style="border: 1px solid black">Mobile Phone 2</th>
                        <th style="border: 1px solid black">Kategori Identitas</th>
                        <th style="border: 1px solid black">No Identitas</th>
                        <th style="border: 1px solid black">Kewarganegaraan</th>
                        <th style="border: 1px solid black">Agama</th>
                        <th style="border: 1px solid black">Profesi</th>
                        <th style="border: 1px solid black">Golongan Darah</th>
                        <th style="border: 1px solid black">Status Nikah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: right">{{ $unit_brand_names[$BUCustomerProfile->unit] }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->customer_id }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->full_name }}</td>
                        <td style="text-align: right">{{ $lookups->getCaptionByLookupNameUnit($lookups_collection, $BUCustomerProfile->gender, 'GENDER', $BUCustomerProfile->unit) }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->dob }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->pob }}</td>
                        <td style="text-align: left">{{ $BUCustomerProfile->address }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->kelurahan }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->kecamatan }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->propinsi }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->kodepos }}</td>
                        <td style="text-align: right">{{ $lookups->getCaptionByLookupNameUnit($lookups_collection, $BUCustomerProfile->status_tempat_tinggal, 'STATUS_TEMPAT_TINGGAL', $BUCustomerProfile->unit) }}</td>
                        <td style="text-align: right">{{ $lookups->getCaptionByLookupNameUnit($lookups_collection, $BUCustomerProfile->type_tempat_tinggal, 'TYPE TEMPAT TINGGAL', $BUCustomerProfile->unit) }}</td>
                        <td style="text-align: right">{{ $lookups->getCaptionByLookupNameUnit($lookups_collection, $BUCustomerProfile->category_tempat_tinggal, 'CATEGORY TEMPAT TINGGAL', $BUCustomerProfile->unit) }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->email1 }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->email2 }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->telepon_rumah }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->telepon_kantor }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->fax }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->mobile_phone1 }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->mobile_phone2 }}</td>
                        <td style="text-align: right">{{ $lookups->getCaptionByLookupNameUnit($lookups_collection, $BUCustomerProfile->id_type, 'ID_TYPE', $BUCustomerProfile->unit) }}</td>
                        <td style="text-align: right">{{ $BUCustomerProfile->getFormattedIdentityNo() }}</td>
                        <td style="text-align: right">{{ $lookups->getCaptionByLookupNameUnit($lookups_collection, $BUCustomerProfile->kewarganegaraan, 'KEWARGANEGARAAN', $BUCustomerProfile->unit) }}</td>
                        <td style="text-align: right">{{ $lookups->getCaptionByLookupNameUnit($lookups_collection, $BUCustomerProfile->religion, 'RELIGION', $BUCustomerProfile->unit) }}</td>
                        <td style="text-align: right">{{ $lookups->getCaptionByLookupNameUnit($lookups_collection, $BUCustomerProfile->profesi, 'PROFESI', $BUCustomerProfile->unit) }}</td>
                        <td style="text-align: right">{{ $lookups->getCaptionByLookupNameUnit($lookups_collection, $BUCustomerProfile->golongan_darah, 'GOLONGAN DARAH', $BUCustomerProfile->unit) }}</td>
                        <td style="text-align: right">{{ $lookups->getCaptionByLookupNameUnit($lookups_collection, $BUCustomerProfile->status_kawin, 'STATUS_KAWIN', $BUCustomerProfile->unit) }}</td>
                    </tr>
                </tbody>
            </table>
            
        @endif
    @empty
        <table>
            <thead>
                <tr>
                    <th colspan='30'>No Business Unit data available</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan='30'>No Business Unit data available</td>
                </tr>
            </tbody>
        </table>
    @endforelse
    <br>

@endforeach
