<?php

namespace App\Http\Resources\DefectData;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {


        return [
            'id' => $this->id,
            'input_id' => $this->input_id,
            'unit' => $this->unit,
            'section_number' => $this->section_number,
            'defect_id' => $this->defect_id,
            'value' => $this->value,
        ];
    }
}
