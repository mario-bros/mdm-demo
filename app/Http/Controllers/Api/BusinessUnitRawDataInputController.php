<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BusinessUnits\Profile;
use App\Helpers\Helper;

use App\Http\Resources\CustomerResource;

class BusinessUnitRawDataInputController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/{business_unit}/customers/profile/store",
     *     tags={"Add Business Unit Customer Profile"},
     *     summary="Create new raw data of Customer",
     *     description="Use json payload to create new data",
     *     operationId="storeProfile",
     *     @OA\RequestBody(
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(
     *                      @OA\Property(
     *                          property="customer_id",
     *                          type="string",
     *                          description="customer id"
     *                      ),
     *                      @OA\Property(
     *                          property="first_name",
     *                          type="string",
     *                          description="nama depan"
     *                      ),
     *                      @OA\Property(
     *                          property="full_name",
     *                          type="string",
     *                          description="nama lengkap"
     *                      ),
     *                      @OA\Property(
     *                          property="middle_name",
     *                          type="string",
     *                          description="nama tengah"
     *                      ),
     *                      @OA\Property(
     *                          property="last_name",
     *                          type="string",
     *                          description="nama belakang"
     *                      ),
     *                      @OA\Property(
     *                          property="surname",
     *                          type="string",
     *                          description="nama marga"
     *                      ),
     *                      @OA\Property(
     *                          property="nickname",
     *                          type="string",
     *                          description="nama panggilan"
     *                      ),
     *                      @OA\Property(
     *                          property="gender",
     *                          type="string",
     *                          description="gender"
     *                      ),
     *                      @OA\Property(
     *                          property="dob",
     *                          type="string",
     *                          description="tanggal lahir"
     *                      ),
     *                      @OA\Property(
     *                          property="pob",
     *                          type="string",
     *                          description="tempat lahir"
     *                      ),
     *                      @OA\Property(
     *                          property="address",
     *                          type="string",
     *                          description="alamat"
     *                      ),
     *                      @OA\Property(
     *                          property="nomor",
     *                          type="string",
     *                          description="nomor"
     *                      ),
     *                      @OA\Property(
     *                          property="blok",
     *                          type="string",
     *                          description="blok"
     *                      ),
     *                      @OA\Property(
     *                          property="rt",
     *                          type="string",
     *                          description="rt"
     *                      ),
     *                      @OA\Property(
     *                          property="rw",
     *                          type="string",
     *                          description="rw"
     *                      ),
     *                      @OA\Property(
     *                          property="kelurahan",
     *                          type="string",
     *                          description="kelurahan"
     *                      ),
     *                      @OA\Property(
     *                          property="kecamatan",
     *                          type="string",
     *                          description="kecamatan"
     *                      ),
     *                      @OA\Property(
     *                          property="kota",
     *                          type="string",
     *                          description="kota"
     *                      ),
     *                      @OA\Property(
     *                          property="propinsi",
     *                          type="string",
     *                          description="propinsi"
     *                      ),
     *                      @OA\Property(
     *                          property="kodepos",
     *                          type="string",
     *                          description="kode pos"
     *                      ),
     *                      @OA\Property(
     *                          property="longitude",
     *                          type="string",
     *                          description="longitude"
     *                      ),
     *                      @OA\Property(
     *                          property="latitude",
     *                          type="string",
     *                          description="latitude"
     *                      ),
     *                      @OA\Property(
     *                          property="status_tempat_tinggal",
     *                          type="string",
     *                          description="status tempat tinggal"
     *                      ),
     *                      @OA\Property(
     *                          property="type_tempat_tinggal",
     *                          type="string",
     *                          description="type tempat tinggal"
     *                      ),
     *                      @OA\Property(
     *                          property="category_tempat_tinggal",
     *                          type="string",
     *                          description="category tempat tinggal"
     *                      ),
     *                      @OA\Property(
     *                          property="email1",
     *                          type="string",
     *                          description="email1"
     *                      ),
     *                      @OA\Property(
     *                          property="email2",
     *                          type="string",
     *                          description="email2"
     *                      ),
     *                      @OA\Property(
     *                          property="telepon_rumah",
     *                          type="number",
     *                          description="telepon rumah"
     *                      ),
     *                      @OA\Property(
     *                          property="telepon_kantor",
     *                          type="number",
     *                          description="telepon kantor"
     *                      ),
     *                      @OA\Property(
     *                          property="fax",
     *                          type="number",
     *                          description="fax"
     *                      ),
     *                      @OA\Property(
     *                          property="mobile_phone1",
     *                          type="number",
     *                          description="mobile phone 1"
     *                      ),
     *                      @OA\Property(
     *                          property="mobile_phone2",
     *                          type="number",
     *                          description="mobile phone 2"
     *                      ),
     *                      @OA\Property(
     *                          property="ktp",
     *                          type="string",
     *                          description="ktp"
     *                      ),
     *                      @OA\Property(
     *                          property="suku",
     *                          type="string",
     *                          description="suku"
     *                      ),
     *                      @OA\Property(
     *                          property="kewarganegaraan",
     *                          type="string",
     *                          description="kewarganegaraan"
     *                      ),
     *                      @OA\Property(
     *                          property="negara",
     *                          type="string",
     *                          description="negara"
     *                      ),
     *                      @OA\Property(
     *                          property="religion",
     *                          type="string",
     *                          description="religion"
     *                      ),
     *                      @OA\Property(
     *                          property="pendidikan",
     *                          type="string",
     *                          description="pendidikan"
     *                      ),
     *                      @OA\Property(
     *                          property="profesi",
     *                          type="string",
     *                          description="profesi"
     *                      ),
     *                      @OA\Property(
     *                          property="golongan_darah",
     *                          type="string",
     *                          description="golongan darah"
     *                      ),
     *                      @OA\Property(
     *                          property="status_kawin",
     *                          type="string",
     *                          description="status kawin"
     *                      ),
     *                      @OA\Property(
     *                          property="mortalitas",
     *                          type="string",
     *                          description="mortalitas"
     *                      ),
     *                      @OA\Property(
     *                          property="status_keaktifan",
     *                          type="string",
     *                          description="status keaktifan"
     *                      ),
     *                      @OA\Property(
     *                          property="status_pengkinian_data",
     *                          type="string",
     *                          description="status pengkinian data"
     *                      ),
     *                      @OA\Property(
     *                          property="product",
     *                          type="string",
     *                          description="product"
     *                      ),
     *                      @OA\Property(
     *                          property="category",
     *                          type="string",
     *                          description="category"
     *                      ),
     *                      @OA\Property(
     *                          property="id_type",
     *                          type="string",
     *                          description="id type"
     *                      ),
     *                      @OA\Property(
     *                          property="home_address_2",
     *                          type="string",
     *                          description="home address 2"
     *                      ),
     *                      @OA\Property(
     *                          property="kode_pos",
     *                          type="string",
     *                          description="kode pos"
     *                      ),
     *                      @OA\Property(
     *                          property="home_country",
     *                          type="string",
     *                          description="home country"
     *                      ),
     *                      @OA\Property(
     *                          property="current_position",
     *                          type="string",
     *                          description="current position"
     *                      ),
     *                      @OA\Property(
     *                          property="annual_income",
     *                          type="string",
     *                          description="annual income"
     *                      ),
     *                      @OA\Property(
     *                          property="source_of_addl_income",
     *                          type="string",
     *                          description="source of addl income"
     *                      ),
     *                      @OA\Property(
     *                          property="additional_income",
     *                          type="string",
     *                          description="additional income"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_full_name",
     *                          type="string",
     *                          description="spouse full name"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_middle_name",
     *                          type="string",
     *                          description="spouse middle name"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_last_name",
     *                          type="string",
     *                          description="spouse last name"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_relationship",
     *                          type="string",
     *                          description="spouse relationship"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_date_of_birth",
     *                          type="string",
     *                          description="spouse date of birth"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_place_of_birth",
     *                          type="string",
     *                          description="spouse place of birth"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_gender",
     *                          type="string",
     *                          description="spouse gender"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_marital_status",
     *                          type="string",
     *                          description="spouse marital status"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_religion",
     *                          type="string",
     *                          description="spouse religion"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_nationality",
     *                          type="string",
     *                          description="spouse nationality"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_id_type",
     *                          type="string",
     *                          description="spouse id type"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_id_no",
     *                          type="string",
     *                          description="spouse id no"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_home_address_1",
     *                          type="string",
     *                          description="spouse home address 1"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_home_address_2",
     *                          type="string",
     *                          description="spouse home address 2"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_home_district",
     *                          type="string",
     *                          description="spouse home district"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_home_subdistrict",
     *                          type="string",
     *                          description="spouse home subdistrict"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_home_city",
     *                          type="string",
     *                          description="spouse home city"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_home_province",
     *                          type="string",
     *                          description="spouse home province"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_home_postal_code",
     *                          type="string",
     *                          description="spouse home postal code"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_home_country",
     *                          type="string",
     *                          description="spouse home country"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_house_status",
     *                          type="string",
     *                          description="spouse home status"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_home_phone_no",
     *                          type="string",
     *                          description="spouse home phone no"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_mobile_phone_no",
     *                          type="string",
     *                          description="spouse mobile phone no"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_email_address",
     *                          type="string",
     *                          description="spouse email address"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_occupation",
     *                          type="string",
     *                          description="spouse occupation"
     *                      ),
     *                      @OA\Property(
     *                          property="spouse_current_position",
     *                          type="string",
     *                          description="spouse current position"
     *                      )
     *                  ),
     *              ),
     *     ),
     *     @OA\Parameter(
     *          name="SecretKey",
     *          description="client api token key",
     *          required=true,
     *          in="header",
     *          name="SecretKey",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(    
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function storeProfile( \App\Http\Requests\PostCustomerRequest $request)
    {
        $dbConn = $request->get('business_unit_db_connection');
        // dd($dbConn);
        if ( $dbConn != $request->get('unit') ) {
            return response()->json(['message' => 'path and key does not match']);
        }

        // $businessUnitProfileInstance = new Profile;
        // $businessUnitProfileInstance->setConnection($dbConn);
        $businessUnitProfileInstance = Helper::businessUnitInstanceByUnit($dbConn);

        $validatedData = $request->formatInput();
        $businessUnitProfileInstance->fill($validatedData);
        $businessUnitProfileInstance->save();

        // $successMessage = 'Data berhasil diinput via API';

        return response('ok', 200);
    }

    /**
     * @OA\Post(
     *     path="/api/{business_unit}/customers/profile/search",
     *     tags={"Retrieve Business Unit Customer Profile"},
     *     summary="Retrieve Customer Data",
     *     description="Use json payload to retrieve customer data",
     *     operationId="retrieveProfile",
     *     @OA\RequestBody(
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(
     *                      @OA\Property(
     *                          property="customer_id",
     *                          type="string",
     *                          description="customer id"
     *                      )
     *                  ),
     *              ),
     *     ),
     *     @OA\Parameter(
     *          name="SecretKey",
     *          description="client api token key",
     *          required=true,
     *          in="header",
     *          name="SecretKey",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(    
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function retrieveProfile( Request $request)
    {
        $dbConn = $request->get('business_unit_db_connection');

        $businessUnitProfileInstance = Helper::businessUnitInstanceByUnit($dbConn);

        $profileData = null;
        foreach ($request->all() as $filterName => $value) {
            if ($filterName == 'customer_id') {
                $profileData = $businessUnitProfileInstance->where($filterName, $value)->first();
            }
        }

        if ($profileData) {
            return ( new CustomerResource($profileData) )->response()->setStatusCode(200);
        } else {
            return response('Data not found')->setStatusCode(200);
        }
    }
}
