<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Search\GoldenRecordSearch;
 
class GoldenRecordSearchController extends Controller
{

    public function filter(Request $request)
    {
        return GoldenRecordSearch::apply($request);
    }
}
