<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Constants\Mime;

class FontsRequest extends FormRequest
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
        $rules['name'] = 'between:4,24|regex:/^[A-Za-z_-]+$/|unique:fonts,name,' . $this->id;
        foreach (Mime::FONTS as $mime) {
            $rules[$mime] = 'correct_mime:' . $mime;
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
            'name.unique' => 'Такой шрифт уже существует. ',
            'name.regex' => 'Допускаются только латинские буквы и "_-" в качестве разделителя слов. ',
            'correct_mime' => 'Не верное расширение файла! ',
        ];
    }
}
