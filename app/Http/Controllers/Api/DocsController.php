<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Search\GoldenRecordSearch;
use App\Model\BusinessUnits\Profile;
use App\Model\BusinessUnits\Address;
use App\Model\Lookups\MDMCity;
use App\Model\Lookups\MDMDistrict;
use App\Model\Lookups\MDMVillage;



class DocsController extends Controller
{
    public function clientSideUsage() 
    {
        return view('api.client_usage_bootstrap');
    }

    public function storeProfile( \App\Http\Requests\PostCustomerRequest $request)
    {
        $profileModel = new Profile();
        $profileModel->setConnection( 'FINA' );

        $APIinputs = $request->all();
        // unset($APIinputs['_token']);

        if ( $APIinputs['submit'] == 'generate') {
            // unset($APIinputs['submit']);
            $validatedData = $request->formatInputToJsonPayload();
            // dd($validatedData);
            $json_payload = (string) json_encode($validatedData);

            return view('api.client_usage_bootstrap', compact('json_payload'));
            // return response()->json($APIinputs);
        } else {
            $validatedData = $request->formatInput();
            // dd($validatedData['addresses']);

            $profileModel->fill($validatedData);
            $profileModel->save();

            if ( isset($validatedData['addresses']) ) {
                foreach ($validatedData['addresses'] as $values) {
                    // dd($value);
                    try{
                        $addressModel = new Address();
                        $addressModel->setConnection( 'FINA' );

                        $values['u_id'] = $profileModel->u_id;
                        $addressModel->fill($values);
                        $addressModel->save();
                    } catch(\Exception $e) {
                        // do task when error
                        echo $e->getMessage();   // insert query
                    }
                }
            }

            $successMessage = 'Data berhasil diinput via API';
            return view('api.client_usage_bootstrap', compact('successMessage'));
        }
    }

    public function testQuery() 
    {
        $request = new \Illuminate\Http\Request();

        $request->replace(['full_name' => 'saryot']);
        // dd($request);
        // return view('api.client_usage', compact('new', 'rejected', 'proposed', 'approved', 'certified'));
        $data = GoldenRecordSearch::apply($request);
        return view('api.client_usage', compact('data'));
    }

    public function populateRegionsByParentId($region_type, $parent_id)
    {
        $results = [];
        $returns = [];
        $regionsByParentId = [];

        switch ($region_type) {
            case 'cities':
                $regionsByParentId = MDMCity::where('province_id', $parent_id)->pluck('name', 'id');
                break;

            case 'districts':
                $regionsByParentId = MDMDistrict::where('regency_id', $parent_id)->pluck('name', 'id');
                break;

            case 'villages':
                $regionsByParentId = MDMVillage::where('district_id', $parent_id)->pluck('name', 'id');
                break;

            default:
                # code...
                break;
        }

        $returns['id'] = "";
        $returns['text'] = "";
        $results[] = $returns;
        foreach ( $regionsByParentId as $key => $val ) {
            // print_r( count($citiesById) ); exit(' xxye ');
            // print_r($val); exit(' xye ');
            $returns['id'] = $key;
            $returns['text'] = $val;
            $results[] = $returns;
        }
        // return response()->json([$returns]);
        // return response()->json([$results]);
        return response()->json($results);
    }
}
