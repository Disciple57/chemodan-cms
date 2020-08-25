<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesRequest extends FormRequest
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
            'name' => 'between:4,24',
            'url' => 'between:4,16|regex:/^[a-z]+$/|not_in:' . env('ADMIN_PANEL_URI'),
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
            'name.between' => 'Введите имя от 4 до 24 символов. ',
            'url.between' => 'Введите адресс от 4 до 16 символов. ',
            'url.regex' => 'Поле должно содержать только латинские буквы в нижнем регистре. ',
            'not_in' => 'Этот адресс зарезервирован. ',
        ];
    }
}