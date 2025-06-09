<?php

namespace App\Http\Resources\DefectData;

use App\Http\Resources\Image\ImageResource;
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
                    'id' => $item->id,
                    'detail_id' => $item->detail_id,
                    'defect_id' => $item->defect_id,
                    'type' => $item->defect->type,
                    'value' => $item->value,
                    'comment' => $item->comment,
                    'images' => ImageResource::collection($item->images)->resolve(),
                ];
            })
        ];
    }
}
