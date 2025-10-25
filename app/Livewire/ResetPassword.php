<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Password as ResetPass;

class ResetPassword extends Component
{
    public string $token;

    #[validate]
    public string $password = '';

    #[validate]
    public string $password_confirmation = '';

    public string $email;

    public function mount(Request $request){
        $this->email = $request->email;
        $this->token = $request->token;
    }
    protected function rules()
    {
        return [
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()

            ],
        ];
    }

    protected $messages = [
        'password.required' => 'فیلد رمز عبور الزامی است.',
        'password.*' => 'رمز عبور باید حداقل ۸ کاراکتر و شامل حروف، عدد و نماد باشد.',
        'password.confirmed' => 'رمز عبور و تکرار آن باید یکسان باشند',

    ];





    public function resetPassword()
    {

        $this->validate();

        $status = ResetPass::reset(
            [
                'email' => $this->email,
                'token' => $this->token,
                'password' => $this->password,
            ],

            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        if($status === ResetPass::INVALID_TOKEN){
            $this->addError('token' , 'توکن بازیابی رمز عبور شما منقضی شده است، لطفا دوباره درخواست بدهید.');
        }
        if($status === ResetPass::INVALID_USER){
            $this->addError('email' , 'خطایی در فرآیند بازیابی رمز عبور رخ داد، لطفا دوباره تلاش کنید');

        }
        if($status === ResetPass::PASSWORD_RESET){
            return redirect()->route('user.auth.login-register-form')->with(['status'=> 'رمز عبور با موفقیت تغییر یافت.']);

        }

    }
    public function render()
    {
        // $this->email = $request->email;
        return view('livewire.reset-password')->layout('layouts.app');
    }
}
