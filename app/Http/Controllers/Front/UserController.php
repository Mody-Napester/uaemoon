<?php

namespace App\Http\Controllers\Front;

use App\Advertise;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
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

    public function __construct()
    {
        $this->middleware('auth.front')->only(['profile', 'update_profile', 'change_password']);
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

    public function profile()
    {
        $data['user'] = Auth::user();
        $data['resources'] = Advertise::with(['category'])->where('created_by', Auth::user()->id)->get();
        return view('front/user/profile', $data);
    }

    public function update_profile(Request $request)
    {
        // Check validation
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|max:20',
        ]);
        $resource = User::edit([
            'name' => $request->name,
            'phone' => $request->phone,
            'updated_by' => auth()->user()->id
        ], Auth::user()->id);

        if ($resource) {
            return redirect(route('front.user.profile'))->with('message', [
                'type' => 'success',
                'text' => trans('website.updated_successfully')
            ]);
        } else {
            return back()->with('message', [
                'type' => 'error',
                'text' => trans('website.oops_try_again_later')
            ])->withInput($request->all());
        }
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:6'],
            'new_confirm_password' => ['same:new_password', 'min:6'],
        ]);
        $resource = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        if ($resource) {
            return redirect(route('front.user.profile'))->with('message', [
                'type' => 'success',
                'text' => trans('website.updated_successfully')
            ]);
        } else {
            return back()->with('message', [
                'type' => 'error',
                'text' => trans('website.oops_try_again_later')
            ])->withInput($request->all());
        }
    }
}
