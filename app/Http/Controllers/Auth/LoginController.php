<?php

namespace App\Http\Controllers\Auth;

use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use Encore\Admin\Controllers\AuthController as BaseAuthController;
use Manzhouya\AuthAttempts\AuthAttempts;
use App\Model\MasterCompany;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends BaseAuthController
{
    use ThrottlesLogins;
    // use AuthenticatesUsers;

    public $maxAttempts;
    public $decayMinutes;
    // protected $redirectTo = '/sys_admin/auth/login';

    public function __construct()
    {
        $this->maxAttempts  = AuthAttempts::config('maxAttempts', 5);
        $this->decayMinutes = AuthAttempts::config('decayMinutes', 1);
    }

    public function getLogin()
    {
        if ($this->guard()->check()) {
            return redirect($this->redirectPath());
        }

        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password', 'captcha']);

        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make($credentials, [
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        unset($credentials['captcha']);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        /*$result = $this->loginLDAP($request);

        if ($result['success']) {
            if ($this->attemptLoginLDAP($request, $result)) {
                return $this->sendLoginResponse($request);
            }
        } else {
            $request->ldaperror = 'You not authorized to access MDM, your email not registered. Please contact HRD to register your email.';
            if ($this->guard()->attempt($credentials, $result)) {
                return $this->sendLoginResponse($request);
            } else {
                unset($request->ldaperror);
            }
        }*/

        if ($this->guard()->attempt($credentials)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return back()->withInput()->withErrors([
            'email' => $this->getFailedLoginMessage(),
        ]);
    }

    protected function loginLDAP(Request $request)
    {
        if (env('APP_ENV') == 'production') {
            try {
                $client = new Client(array(
                    'base_uri' => env('API_MNC_USERS'),
                ));
                $get = $client->request('POST', '', array(
                    'form_params' => array(
                        'username'        => $request->input('email'),
                        'password'        => $request->input('password'),
                        'application_key' => 'mdm_customer',
                    ),
                ));
                return json_decode($get->getBody(), true);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                return json_decode(json_encode([
                    'success' => false,
                    'message' => $e->getMessage(),
                ]), true);
            }
        }
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLoginLDAP(Request $request, $result)
    {
        $user = Administrator::where('email', $request->email)->first();

        // If not found in DB, then we create new one
        if ( ! $user) {
            $user = $this->createNewUser($request);
        }

        return $this->guard()
            ->loginUsingId(($user) ? $user->id : null);
    }

    protected function createNewUser($request)
    {
        $usersTable = config('admin.database.users_table');
        $roleUsersTable = config('admin.database.role_users_table');

        // Timestamp related fields
        $createdAt = $updatedAt = date('Y-m-d H:i:s', time());

        // Business unit sample row
        $businessUnitDefault = MasterCompany::where('id', 'TEST' )->first();

        $usernameArr = explode('@', $request->email );
        $username = reset( $usernameArr );
        $nameArr = explode('.', $username);
        $name =  ucwords( implode(" ", $nameArr) );

        $newUser = [
            'username' => $username,
            'password' => bcrypt( $request->input('password') ),
            'name' => $name,
            'unit_id' => $businessUnitDefault->id,
            'email' => $request->email,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];

        \DB::table( $usersTable )->insert([$newUser]);

        $rolesTable = config('admin.database.roles_table');

        $roleHolding = \DB::table($rolesTable)->where('slug', 'holding')->first();
        $newUser = \DB::table($usersTable)->where('email', $request->email)->first();
        $roleNewUser = [
            'role_id' => $roleHolding->id,
            'user_id' => $newUser->id,
        ];

        \DB::table( $roleUsersTable )->insert([ $roleNewUser ]);

        return $newUser;
    }
}
