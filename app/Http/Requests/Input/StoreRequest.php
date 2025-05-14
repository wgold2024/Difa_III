<?php

namespace App\Http\Requests\Input;

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
//        dd($this);

        return [
            'id' => 'nullable|integer|exists:inputs,id',
            'op' => 'required|string',
            'city' => 'required|string',
            'company'=> 'required|string',
            'field' => 'required|string',
            'cluster' => 'required|string',
            'well' => 'required|string',
//            'installation_date_at' => 'required|date',
//            'start_date_at' => 'required|date',
//            'stop_date_at' => 'required|date',
//            'dismantling_date_at' => 'required|date',
//            'analysis_date_at' => 'required|date',
//            'operating_time' => 'required|integer',
//            'stop_reason' => 'required|string',
//            'mode' => 'required|string',
//            'sl_key' => 'nullable|string',
//            'note' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'id.integer' => 'Поле "id" должно быть числом',
            'id.exists' => 'Переданный "id" не содержится в записях',
            'op.required' => 'Поле "op" необходимо для заполнения',
            'op.string' => 'Поле "op" должно быть строкой',
            'city.required' => 'Поле "city" необходимо для заполнения',
            'city.string' => 'Поле "city" должно быть строкой',
            'company.required' => 'Поле "company" необходимо для заполнения',
            'company.string' => 'Поле "company" должно быть строкой',
            'field.required' => 'Поле "field" необходимо для заполнения',
            'field.string' => 'Поле "field" должно быть строкой',
            'cluster.required' => 'Поле "cluster" необходимо для заполнения',
            'cluster.string' => 'Поле "cluster" должно быть строкой',
            'well.required' => 'Поле "well" необходимо для заполнения',
            'well.string' => 'Поле "well" должно быть строкой',
//            'installation_date_at.required' => 'Поле необходимо для заполнения',
//            'start_date_at.required' => 'Поле необходимо для заполнения',
//            'stop_date_at.required' => 'Поле необходимо для заполнения',
//            'dismantling_date_at.required' => 'Поле необходимо для заполнения',
//            'analysis_date_at.required' => 'Поле необходимо для заполнения',
//            'operating_time.required' => 'Поле необходимо для заполнения',
//            'stop_reason.required' => 'Поле необходимо для заполнения',
//            'mode.required' => 'Поле необходимо для заполнения',
////            'user_id.required' => 'Поле необходимо для заполнения',
////            'user_id.integer' => 'Это поле должно быть числом',
        ];
    }
}
