<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use App\Model\MasterCompany;
use Illuminate\Support\Facades\Auth;

// class AuthApiKeyClient extends Middleware
class AuthApiKeyClient
{
    // public function handle($request, Closure $next, ...$guard)
    public function handle($request, Closure $next)
    {
        $tokenHeader = $request->header('SecretKey');
        $validApiClient = MasterCompany::where('api_secret_key', $tokenHeader)->first();

        if ( is_null($validApiClient) ) {
            return response()->json(['message' => 'key invalid']);
        } else {
            $segmentPath = $request->segment(2);
            $pathMap = array_flip($validApiClient::$businessUnitPaths);

            if ( ! array_key_exists($segmentPath, $pathMap) ) {
                return response()->json(['message' => 'path invalid']);
            } elseif ($pathMap[$segmentPath] != $validApiClient->id ) {
                return response()->json(['message' => 'path and key does not match']);
            }

            $request->attributes->add(['business_unit_db_connection' => $validApiClient->id]);
            return $next($request);
        }

        
    }
}
