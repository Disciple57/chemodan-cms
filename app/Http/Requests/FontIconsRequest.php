<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Constants\Mime;

class FontIconsRequest extends FormRequest
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
        $rules['prefix'] = 'between:2,5|regex:/^[a-z]+$/';
        foreach (Mime::FONTS as $mime) {
            $rules[$mime] = 'correct_mime:' . $mime;
        }
        $rules[Mime::FONT_SVG[0]] = 'required|correct_mime:' . Mime::FONT_SVG[0] . '|correct_svg_font';
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
            'prefix.between' => 'Префикс должен содержать от 2 до 5 символов. ',
            'prefix.regex' => 'Допускаются только латинские буквы в нижнем регистре. ',
            'required' => 'Файл обязателен для загрузки! ',
            'correct_mime' => 'Не верное расширение файла! ',
            'correct_svg_font' => 'Не верный формат svg! ',
        ];
    }
}
