<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rules\Password;

class LoginForm extends Form
{
    #[Validate]
    public string $email = '';

    #[Validate]
    public string $password = '';

    public  $remember = false;



        protected function rules() : array
        {
            return [
                'email' => ['required', 'string', 'email'],
                'password' => ['required' , Password::min(8)],
            ];

        }


        protected function messages()
        {
            return[
                'email.required' => 'فیلد ایمیل الزامی است',
                'email.string' => 'کارتر ها باید رشته باشند',
                'email.email' => 'ورودی باید از نوع ایمیل باشد',
                'password.required' => 'فیلد رمز عبور الزامی است',
                'password.min' => 'رمز عبور باید حداقل 8 کارکتر باشد',
            ];
        }
}
