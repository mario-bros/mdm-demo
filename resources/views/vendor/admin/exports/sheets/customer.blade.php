@inject('lookups', 'App\Model\Lookups')
@inject('cityLookup', 'App\Model\Lookups\MDMCity')
@inject('villageLookup', 'App\Model\Lookups\MDMVillage')
@inject('districtLookup', 'App\Model\Lookups\MDMDistrict')
@inject('provinceLookup', 'App\Model\Lookups\MDMProvince')
@inject('masterCompanyLookup', 'App\Model\MasterCompany')

<table>
    <thead>
    <tr>
        <th>UID</th>
        <th>UID Golden</th>
        <th>Unit</th>
        <th>Customer ID</th>
        <th>Full Name</th>
        <th>Gender</th>
        <th>Tgl Lahir</th>
        <th>Tempat Lahir</th>
        <th>Alamat</th>
        <th>Kelurahan</th>
        <th>Kecamatan</th>
        <th>Propinsi</th>
        <th>Status Tempat Tinggal</th>
        <th>Tipe Tempat Tinggal</th>
        <th>Kategori Tempat Tinggal</th>
        <th>Email 1</th>
        <th>Email 2</th>
        <th>Telepon Rumah</th>
        <th>Telepon Kantor</th>
        <th>Fax</th>
        <th>Mobile Phone 1</th>
        <th>Mobile Phone 2</th>
        <th>Kategori Identitas</th>
        <th>KTP</th>
        <th>Kewarganegaraan</th>
        <th>Agama</th>
        <th>Profesi</th>
        <th>Golongan Darah</th>
        <th>Status Nikah</th>
    </tr>
    </thead>
    <tbody>
    @foreach($profiles as $customerGoldenRecord)
        <tr>
            <td>{{ $customerGoldenRecord->u_id }}</td>
            <td>{{ $customerGoldenRecord->uid_golden }}</td>
            <td>{{ $masterCompanyLookup->getFullNameByUnitName($customerGoldenRecord->unit) }}</td>
            <td>{{ $customerGoldenRecord->customer_id }}</td>
            <td>{{ $customerGoldenRecord->full_name }}</td>
            <td>{{ $lookups->getNameById($customerGoldenRecord->gender) }}</td>
            <td>{{ $customerGoldenRecord->dob }}</td>
            <td>{{ $customerGoldenRecord->pob }}</td>
            <td>{{ $customerGoldenRecord->address }}</td>
            <td>{{ $villageLookup->getNameById($customerGoldenRecord->kelurahan_id) }}</td>
            <td>{{ $districtLookup->getNameById($customerGoldenRecord->kecamatan_id) }}</td>
            <td>{{ $provinceLookup->getNameById($customerGoldenRecord->propinsi_id) }}</td>
            <td>{{ $customerGoldenRecord->kodepos }}</td>
            <td>{{ $lookups->getNameById($customerGoldenRecord->status_tempat_tinggal_id) }}</td>
            <td>{{ $lookups->getNameById($customerGoldenRecord->type_tempat_tinggal_id) }}</td>
            <td>{{ $lookups->getNameById($customerGoldenRecord->category_tempat_tinggal_id) }}</td>
            <td>{{ $customerGoldenRecord->email1 }}</td>
            <td>{{ $customerGoldenRecord->email2 }}</td>
            <td>{{ $customerGoldenRecord->telepon_rumah }}</td>
            <td>{{ $customerGoldenRecord->telepon_kantor }}</td>
            <td>{{ $customerGoldenRecord->fax }}</td>
            <td>{{ $customerGoldenRecord->mobile_phone1 }}</td>
            <td>{{ $customerGoldenRecord->mobile_phone2 }}</td>
            <td>{{ $lookups->getNameById($customerGoldenRecord->category_identity_id) }}</td>
            <td>{{ $customerGoldenRecord->ktp }}</td>
            <td>{{ $lookups->getNameById($customerGoldenRecord->kewarganegaraan_id) }}</td>
            <td>{{ $lookups->getNameById($customerGoldenRecord->religion_id) }}</td>
            <td>{{ $lookups->getNameById($customerGoldenRecord->profesi_id) }}</td>
            <td>{{ $lookups->getNameById($customerGoldenRecord->golongan_darah_id) }}</td>
            <td>{{ $lookups->getNameById($customerGoldenRecord->status_kawin_id) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<br>

@forelse($business_units as $customer)
    @if ($customer->logo != '')
        <img src="{{ $customer->logo }}" width="75" height="75" >
    @else
        <img src="{{ public_path('uploads/images/default-logo.png') }}" width="75" height="75" >
    @endif

    <br>
    <table>
        <thead>
            <tr>
                <th>UID</th>
                <th>Unit</th>
                <th>Customer ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Tgl Lahir</th>
                <th>Tempat Lahir</th>
                <th>Alamat</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Propinsi</th>
                <th>Status Tempat Tinggal</th>
                <th>Tipe Tempat Tinggal</th>
                <th>Kategori Tempat Tinggal</th>
                <th>Email 1</th>
                <th>Email 2</th>
                <th>Telepon Rumah</th>
                <th>Telepon Kantor</th>
                <th>Fax</th>
                <th>Mobile Phone 1</th>
                <th>Mobile Phone 2</th>
                <th>Kategori Identitas</th>
                <th>KTP</th>
                <th>Kewarganegaraan</th>
                <th>Agama</th>
                <th>Profesi</th>
                <th>Golongan Darah</th>
                <th>Status Nikah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $customer->u_id }}</td>
                <td>{{ $masterCompanyLookup->getFullNameByUnitName($customer->unit) }}</td>
                <td>{{ $customer->customer_id }}</td>
                <td>{{ $customer->full_name }}</td>
                <td>{{ $lookups->getNameById($customer->gender) }}</td>
                <td>{{ $customer->dob }}</td>
                <td>{{ $customer->pob }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $villageLookup->getNameById($customer->kelurahan_id) }}</td>
                <td>{{ $districtLookup->getNameById($customer->kecamatan_id) }}</td>
                <td>{{ $provinceLookup->getNameById($customer->propinsi_id) }}</td>
                <td>{{ $customer->kodepos }}</td>
                <td>{{ $lookups->getNameById($customer->status_tempat_tinggal_id) }}</td>
                <td>{{ $lookups->getNameById($customer->type_tempat_tinggal_id) }}</td>
                <td>{{ $lookups->getNameById($customer->category_tempat_tinggal_id) }}</td>
                <td>{{ $customer->email1 }}</td>
                <td>{{ $customer->email2 }}</td>
                <td>{{ $customer->telepon_rumah }}</td>
                <td>{{ $customer->telepon_kantor }}</td>
                <td>{{ $customer->fax }}</td>
                <td>{{ $customer->mobile_phone1 }}</td>
                <td>{{ $customer->mobile_phone2 }}</td>
                <td>{{ $lookups->getNameById($customer->category_identity_id) }}</td>
                <td>{{ $customer->ktp }}</td>
                <td>{{ $lookups->getNameById($customer->kewarganegaraan_id) }}</td>
                <td>{{ $lookups->getNameById($customer->religion_id) }}</td>
                <td>{{ $lookups->getNameById($customer->profesi_id) }}</td>
                <td>{{ $lookups->getNameById($customer->golongan_darah_id) }}</td>
                <td>{{ $lookups->getNameById($customer->status_kawin_id) }}</td>
            </tr>
        </tbody>
    </table>
    <br>
@empty
    <table>
        <thead>
            <tr>
                <th colspan='30'>No data available</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan='30'>No data available</td>
            </tr>
        </tbody>
    </table>
    <br>
@endforelse