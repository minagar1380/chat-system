<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    #[Validate('required|email')]
    public $email;


    public function getRules(): array
    {
        return [
            'email' => 'required|email',
        ];
    }


    public function getMessages(): array
    {
        return [
            'email.required' => 'فیلد ایمیل الزامی است',
            'email.email' => 'شناسه باید از نوع ایمیل باشد',
        ];
    }


    public function sendResetLinkEmail()
    {
        $this->validate();

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status === Password::RESET_LINK_SENT) {
            return $message = 'لینک حاوی بازنشانی رمز عبور برای شما ارسال شده است';
        } else {
            return $this->addError('email' , 'آدرس ایمیل شما ثبت نشده یا اشتباه است');
        }

    }
    public function render()
    {
        return view('livewire.forgot-password')->layout('layouts.app');
    }
}
