<?php

namespace App\Http\Requests\DefectData;

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
            'input_id' => 'required|integer|exists:inputs,id',
            'unit' => 'required|string',
            'sections' => 'array',
//            'section_number' => 'required|integer',
//            'defect_id' => 'required|integer|exists:defects,id',
//            'value' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'input_id.required' => 'Поле "input_id" необходимо для заполнения',
            'input_id.integer' => 'Поле "input_id" должно быть числом',
            'input_id.exists' => 'Переданный "input_id" не содержится в таблице inputs',
            'unit.required' => 'Поле "unit" необходимо для заполнения',
            'unit.string' => 'Поле "unit" должно быть строкой',
            'section_number.required' => 'Поле "section_number" необходимо для заполнения',
            'section_number.string' => 'Поле "section_number" должно быть числом',
            'defect_id.required' => 'Поле "defect_id" необходимо для заполнения',
            'defect_id.integer' => 'Поле "defect_id" должно быть числом',
            'defect_id.exists' => 'Переданный "defect_id" не содержится в таблице defects',
            'value.required' => 'Поле "value" необходимо для заполнения',
            'value.string' => 'Поле "value" должно быть строкой',
        ];
    }
}
