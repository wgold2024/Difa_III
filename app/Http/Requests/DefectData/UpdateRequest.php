<?php

namespace App\Http\Requests\DefectData;

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
            'input_id' => 'integer|exists:inputs,id',
            'unit' => 'string',
            'section_number' => 'integer',
            'defect_id' => 'integer|exists:defects,id',
            'value' => 'string',
        ];
    }

    public function messages(): array
    {
        return [
            'input_id.integer' => 'Поле "input_id" должно быть числом',
            'input_id.exists' => 'Переданный "input_id" не содержится в таблице inputs',
            'unit.string' => 'Поле "unit" должно быть строкой',
            'section_number.string' => 'Поле "section_number" должно быть числом',
            'defect_id.integer' => 'Поле "defect_id" должно быть числом',
            'defect_id.exists' => 'Переданный "defect_id" не содержится в таблице defects',
            'value.string' => 'Поле "value" должно быть строкой',
        ];
    }
}
