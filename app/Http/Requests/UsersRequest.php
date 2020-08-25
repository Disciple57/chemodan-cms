<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Constants\Role;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'between:4,100', 'unique:user_admin,name,' . $this->user],
            'password' => ['required', 'string', 'between:8,100', 'confirmed'],
            'role' => ['in:' . Role::SUPERADMIN . ',' . Role::ADMIN . ',' . Role::USER],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Имя должно содержать от 4 до 100 символов. ',
            'name.string' => 'Имя не должно содержать пробелы. ',
            'name.between' => 'Имя должно содержать от 4 до 100 символов. ',
            'name.unique' => 'Такой пользователь уже существует. ',
            'password.required' => 'Пароль должен содержать от 8 до 100 символов. ',
            'password.string' => 'Пароль не должен содержать пробелы. ',
            'password.between' => 'Пароль должен содержать от 8 до 100 символов. ',
            'password.confirmed' => 'Пароли не совпадают. ',
        ];
    }
}
