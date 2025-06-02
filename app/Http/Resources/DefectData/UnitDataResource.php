<?php

namespace App\Http\Resources\DefectData;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'section_number' => $this->section_number,
            'defect_id' => $this->defect_id,
            'value' => $this->value,
        ];
    }
}
