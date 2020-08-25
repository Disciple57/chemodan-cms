<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SeoRequest extends FormRequest
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
            'title' => 'required|between:5,100',
            'description' => 'required|between:50,250',
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
            'title.required' => 'Заголовок не может быть пустым! ',
            'title.between' => 'Заголовок должен содержать от 5 до 100 символов. ',
            'description.required' => 'Краткое содержание не заполнено! ',
            'description.between' => 'Краткое содержание должно соответствовать от 50 до 250 символов. ',
        ];
    }
}
