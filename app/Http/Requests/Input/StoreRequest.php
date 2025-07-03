<?php

namespace App\Http\Requests\Input;

use Carbon\Carbon;
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
            'id' => 'nullable|integer|exists:inputs,id',
            'op' => 'required|string',
            'city' => 'required|string',
            'contract_number' => 'nullable|string',
            'company'=> 'required|string',
            'field' => 'required|string',
            'cluster' => 'required|string',
            'well' => 'required|string',
            'installation_date_at' => 'required|date',
            'start_date_at' => 'required|date',
            'stop_date_at' => 'required|date',
            'dismantling_date_at' => 'required|date',
            'analysis_date_at' => 'required|date',
            'operating_time' => 'required|integer',
            'stop_reason' => 'required|string',
            'mode' => 'required|string',
            'sl_key' => 'nullable|string',
            'note' => 'nullable|string',
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
            'contract_number.string' => 'Поле "contract_number" должно быть строкой',
            'company.required' => 'Поле "company" необходимо для заполнения',
            'company.string' => 'Поле "company" должно быть строкой',
            'field.required' => 'Поле "field" необходимо для заполнения',
            'field.string' => 'Поле "field" должно быть строкой',
            'cluster.required' => 'Поле "cluster" необходимо для заполнения',
            'cluster.string' => 'Поле "cluster" должно быть строкой',
            'well.required' => 'Поле "well" необходимо для заполнения',
            'well.string' => 'Поле "well" должно быть строкой',
            'installation_date_at.required' => 'Поле "installation_date_at" необходимо для заполнения',
            'installation_date_at.date' => 'Поле "installation_date_at" должно быть датой',
            'start_date_at.required' => 'Поле "start_date_at" необходимо для заполнения',
            'start_date_at.date' => 'Поле "start_date_at" должно быть датой',
            'stop_date_at.required' => 'Поле "stop_date_at" необходимо для заполнения',
            'stop_date_at.date' => 'Поле "stop_date_at" должно быть датой',
            'dismantling_date_at.required' => 'Поле "dismantling_date_at" необходимо для заполнения',
            'dismantling_date_at.date' => 'Поле "dismantling_date_at" должно быть датой',
            'analysis_date_at.required' => 'Поле "analysis_date_at" необходимо для заполнения',
            'analysis_date_at.date' => 'Поле "analysis_date_at" должно быть датой',
            'operating_time.required' => 'Поле "operating_time" необходимо для заполнения',
            'operating_time.integer' => 'Поле "operating_time" должно быть числом',
            'stop_reason.required' => 'Поле "stop_reason" необходимо для заполнения',
            'stop_reason.string' => 'Поле "stop_reason" должно быть строкой',
            'mode.required' => 'Поле "mode" необходимо для заполнения',
            'mode.string' => 'Поле "mode" должно быть строкой',
            'sl_key.string' => 'Поле "sl_key" должно быть строкой',
            'note.string' => 'Поле "note" должно быть строкой',
////            'user_id.required' => 'Поле необходимо для заполнения',
////            'user_id.integer' => 'Это поле должно быть числом',
        ];
    }

    public function prepareForValidation() {
        $timeZone = $this->header('X-Timezone');

        $this->merge([
            'contract_number' => $this->contractNumber,
            'installation_date_at' => $this->installationDateAt ? Carbon::parse($this->installationDateAt)->timezone($timeZone) : null,
            'start_date_at' =>  $this->startDateAt ? Carbon::parse($this->startDateAt)->timezone($timeZone) : null,
            'stop_date_at' =>  $this->stopDateAt ? Carbon::parse($this->stopDateAt)->timezone($timeZone) : null,
            'dismantling_date_at' =>  $this->dismantlingDateAt ? Carbon::parse($this->dismantlingDateAt)->timezone($timeZone) : null,
            'analysis_date_at' =>  $this->analysisDateAt ? Carbon::parse($this->analysisDateAt)->timezone($timeZone) : null,
            'operating_time' => $this->operatingTime,
            'stop_reason' => $this->stopReason,
            'sl_key' => $this->slKey,
        ]);
    }

}
