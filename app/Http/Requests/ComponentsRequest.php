<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ComponentsRequest extends FormRequest
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
        $rules = [
            'name' => 'between:4,24',
            'filename' => 'between:4,16|regex:/^[a-z]+$/',
        ];

        $fields = collect(['html', 'css', 'js']);
        foreach ($fields as $field) {
            $rules[$field] = 'required_without_all:' . implode(',', $fields->whereNotIn(null, [$field])->toArray());
        }

        return $rules;
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
            'filename.between' => 'Введите имя файла от 4 до 16 символов. ',
            'filename.regex' => 'Поле должно содержать только латинские буквы в нижнем регистре. ',
            'required_without_all' => 'Компонент должен содержать код! Заполните хотя-бы одно из трех полей'
        ];
    }
}