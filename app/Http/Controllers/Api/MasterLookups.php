<?php

namespace App\Http\Controllers\Api;

use App\Model\Profile;
use Illuminate\Http\Request;
use App\Model\Lookups\MDMCity;
use App\Model\Lookups\MDMVillage;
use App\Model\Lookups\MDMDistrict;
use App\Http\Controllers\Controller;

class MasterLookups extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function users(Request $request)
    {
        $q = $request->get('q');

        return Profile::where('email1', 'like', "%$q%")->paginate(null, ['id', 'email1 as text']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function city(Request $request)
    {
        $q = $request->get('q');

        return MDMCity::where('province_id', $q)->get(['id', \DB::raw('name as text')]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function district(Request $request)
    {
        $q = $request->get('q');

        return MDMDistrict::where('regency_id', $q)->get(['id', \DB::raw('name as text')]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function village(Request $request)
    {
        $q = $request->get('q');

        return MDMVillage::where('district_id', $q)->get(['id', \DB::raw('name as text')]);
    }  
}
