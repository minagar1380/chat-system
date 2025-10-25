<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;

class RegisterForm extends Form
{
    #[Validate]
    public string $email = '';

    #[Validate]
    public string $name = '';

    #[Validate]
    public string $password = '';

    #[Validate]
    public string $password_confirmation = '';



    protected function rules() : array
    {
        return [
            'name' => ['required','max:120','min:1','regex:/^[ا-یa-zA-Zء-ي ]+$/u'],
            'email' => ['required', 'string', 'email' , 'unique:users'],
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols() , 'confirmed'],
        ];
    }



    protected function messages()
    {
        return[
            'email.required' => 'فیلد ایمیل الزامی است',
            'email.string' => 'کارتر ها باید رشته باشند',
            'email.email' => 'ورودی باید از نوع ایمیل باشد',
            'email.unique' => 'کاربری با این ایمیل وجود دارد',
            'name.required' => 'فیلد نام الزامی است',
            'name.max' => 'حداکثر کارکتر مجاز 120 عدد است',
            'name.min' => 'حداقل کارکتر مجاز 1 عدد است',
            'name.regex' => 'کارکتر مورد نظر غیر مجاز است',
            'password.required' => 'فیلد رمز عبور الزامی است',
            'password.letters' => 'رمز عبور باید شامل حروف باشد',
            'password.mixed' => 'رمز عبور باید شامل حروف کوچک و بزرگ باشد',
            'password.numbers' => 'رمز عبور باید شامل عدد باشد',
            'password.symbols' => 'رمز عبور باید حداقل شامل نماد باشد',
            // 'password.uncompromised' => 'رمز عبور ضعیف است',
            'password.min' => 'رمز عبور باید حداقل 8 کارکتر باشد',
            'password.confirmed' => 'رمز عبور و تکرار آن یکسان نیست',
        ];
    }
}
