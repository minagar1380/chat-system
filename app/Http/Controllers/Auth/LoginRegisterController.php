<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;
use App\Http\Requests\LoginRegisterRequest;

class LoginRegisterController extends Controller
{



    public function LoginRegisterForm(){
        return view('login-register');
    }





    public function Login(LoginRegisterRequest $request)
    {
        $inputs = $request->all();

        $user = User::where('email', $inputs['email'])->orwhere('password', $inputs['password'])->first();


        if (empty($user)) {
            return back()->withErrors('چنین شناسه ای پیدا نشد ، دوباره امتحان کنید');
        } elseif ($inputs['email'] !== $user->email || $inputs['password'] !== $user->password) {
            return back()->withErrors('ایمیل یا پسورد اشتباه است ، دوباره امتحان کنید');
        }

        $user->update(['email_verified_at' => Carbon::now()]);
        Auth::login($user);

        return redirect()->route('chats');
    }





    public function Register(LoginRegisterRequest $request)
    {
        $inputs = $request->all();
        $inputs['email'] = $request->email;
        $inputs['password'] = Hash::make($request->password);
        $user = User::create($inputs);
        return redirect()->route('chats');
    }
}
