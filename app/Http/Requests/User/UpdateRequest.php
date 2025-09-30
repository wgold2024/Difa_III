<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'email' => 'string|max:255|email|unique:users,email,' . $this->id,
            'password' => 'string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'id.integer' => 'Поле "id" должно быть числом',
            'name.string' => 'Поле "name" должно быть строкой',
            'name.max' => 'Превышен размер поля "name"',
            'email.string' => 'Поле "email" должно быть строкой',
            'email.max' => 'Превышен размер поля "email"',
            'email.email' => 'Поле "email" не соотвествует формату',
            'email.unique' => 'Поле "email" должно быть уникальным',
            'password.string' => 'Поле "password" должно быть строкой',
            'password.min' => 'Минимальный размер поля "password" должен быть 8 символов',
            'password.confirmed' => 'Введенные пароли не совпадают',
        ];
    }
}
