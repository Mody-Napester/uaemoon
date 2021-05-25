<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\RoleUser;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthAPIController extends Controller
{
    /**
     * Login
     */
    public function login(Request $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])){

            $user = User::find(auth()->user()->id);
            $user->api_token = str_random(36);
            $user->save();

            $user->status = 1;

            return response($user);
        }else{
            return response([
                'status' => 0
            ]);
        }
    }

    /**
     * Register
     */
    public function register(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1,
            'created_by' => 0,
            'updated_by' => 0,
        ]);

        return response($user);
    }

    /**
     * Update User
     */
    public function update_user(Request $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        if($user){
            $user->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user = User::where('uuid', $uuid)->first();
            $user->status = 1;

            return response($user);
        }else{
            return response([
                'status' => 0
            ]);
        }
    }
}
