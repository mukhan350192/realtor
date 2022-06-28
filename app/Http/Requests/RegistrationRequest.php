<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone' => 'required|unique:users|string|min:11|max:11',
            'code' => 'required|integer|min:4|max:4',
            'iin' => 'required|string|min:12|max:12',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'phone' => 'Телефон не передан',
            'code' => 'Код должен четырехзначным',
            'iin' => 'Длина ИИН должен быть 12',
            'password' => 'Длина пароля должен быть минимум 6'
        ];
    }
}
