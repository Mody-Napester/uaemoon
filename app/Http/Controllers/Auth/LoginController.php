<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\UserLoginHistory;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    protected function authenticated(\Illuminate\Http\Request $request, $user)
    {
        UserLoginHistory::addLoginHistory();
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('dashboard.index');
    }
}
