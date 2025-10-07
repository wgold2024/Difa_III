<?php

namespace App\Http\Requests\UserGroup;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:255|unique:user_groups,name' . $this->id,
            'description' => 'string',
            'parent_id' => 'nullable|integer|exists:user_groups,id',
            'position' => 'integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'Поле "name" должно быть строкой',
            'name.max' => 'Превышен размер поля "name"',
            'name.unique' => 'Поле "name" должно быть уникальным',
            'description.string' => 'Поле "description" должно быть строкой',
            'parent_id.integer' => 'Поле "parent_id" должно быть числом',
            'parent_id.exists' => 'Поле "parent_id" должно быть в этой таблице',
            'position.integer' => 'Поле "position" должно быть числом',
        ];
    }
}
