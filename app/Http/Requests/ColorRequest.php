<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ColorRequest extends FormRequest
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
            'color' => 'between:10,25|regex:/^[a-z0-9,.)( ]+$/|unique:colors,color,' . $this->id,
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
            'color.between' => 'Неверный формат цвета. ',
            'color.unique' => 'Такой цвет уже существует в наборе. ',
            'color.regex' => 'Неверный формат. ',
        ];
    }
}
