<?php

namespace App\Http\Requests\UserGroup;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:user_groups',
            'description' => 'required|string',
            'parent_id' => 'nullable|integer|exists:user_groups,id',
            'position' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "name" необходимо для заполнения',
            'name.string' => 'Поле "name" должно быть строкой',
            'name.max' => 'Превышен размер поля "name"',
            'name.unique' => 'Поле "name" должно быть уникальным',
            'description.required' => 'Поле "description" необходимо для заполнения',
            'description.string' => 'Поле "description" должно быть строкой',
            'parent_id.integer' => 'Поле "parent_id" должно быть числом',
            'parent_id.exists' => 'Поле "parent_id" должно быть в этой таблице',
            'position.required' => 'Поле "position" необходимо для заполнения',
            'position.integer' => 'Поле "position" должно быть числом',
        ];
    }
}
