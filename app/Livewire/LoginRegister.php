<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Livewire\Forms\LoginForm;
use App\Livewire\Forms\RegisterForm;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegister extends Component
{

    public LoginForm $Lform;
    public RegisterForm $Rform;




    public function Login()
    {
        $this->Lform->validate();

        $user = User::where('email', $this->Lform->email)->orwhere('password', $this->Lform->password)->first();


        if (!$user) {
            $this->addError('Lform.email', 'چنین شناسه ای پیدا نشد ، دوباره امتحان کنید');
            return;
        }

        if (! Hash::check($this->Lform->password, $user->password)) {
            $this->addError('Lform.password', ' پسورد اشتباه است ، دوباره امتحان کنید');
            return;
        }
        if(!empty($this->Lform->remember)){
            session()->regenerate();
        }

        $user->update(['email_verified_at' => Carbon::now()]);
        Auth::login($user);

        return redirect()->route('chats');
    }



    public function Register()
    {
        $this->Rform->validate();

        // $inputs['name'] = $this->Rform->name;
        // $inputs['email'] = $this->Rform->email;
        // $inputs['password'] = Hash::make($this->Rform->password);
        $user = User::create($this->Rform->all());
        Auth::login($user);
        return redirect()->route('chats');
    }

    public function Logout(){
        Auth::logout();
        return redirect()->route('user.auth.login-register-form');

    }





    public function render()
    {
        return view('livewire.login-register')->layout('layouts.app');
    }
}
