<?php

namespace App\Http\Resources\DefectData;

use App\Http\Resources\Input\InputResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DefectDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'input_id' => $this->input_id,
            'unit' => $this->unit,
            'section_number' => $this->section_number,
            'detail_id' => $this->detail_id,
            'defect_id' => $this->defect_id,
            'value' => $this->value,
        ];
    }
}
