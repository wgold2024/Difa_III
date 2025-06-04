<?php

namespace App\Http\Resources\DefectData;

use App\Http\Resources\Input\InputResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupedDefectDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'section_number' => $this->section_number,
            'defects' => $this->items->map(function ($item) {
                return [
                    'detail_id' => $item->detail_id,
                    'defect_id' => $item->defect_id,
                    'value' => $item->value
                ];
            })
        ];
    }
}
