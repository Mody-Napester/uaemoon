<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Settings;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use AuthenticatesUsers {
        logout as performLogout;
    }

    public function login_or_register()
    {
        $data['settings'] = Settings::getById(1);
        return view('front/user/login_or_register', $data);
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $rememberme = false;
        if (isset($request->rememberme) && $request->rememberme == 'forever') {
            $rememberme = true;
        }
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password], $rememberme)
        ) {
            return redirect('/');
        }
        return back()->withInput($request->all())->with('message', [
            'type' => 'danger',
            'text' => trans('website.invalid_email_or_password')
        ]);
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'register_email' => 'email|unique:users,email',
            'register_password' => 'required|confirmed|min:6',
        ]);
        $resource = User::create([
            'name' => $request['name'],
            'email' => $request['register_email'],
            'password' => Hash::make($request['register_password']),
            'status' => 1,
            'type' => 2, // from website
        ]);
        // Return
        if ($resource) {
            return back()->with('message', [
                'type' => 'success',
                'text' => trans('website.registered_successfully_you_can_login_now')
            ]);
        } else {
            return back()->withInput($request->all())->with('message', [
                'type' => 'error',
                'text' => trans('website.oops_message')
            ]);
        }
    }

    public function getLogout(Request $request)
    {
        $lang = lang();
        $this->performLogout($request);
        session()->put('language', $lang);
        return redirect('/');
    }
}
