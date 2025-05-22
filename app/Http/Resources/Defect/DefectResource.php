<?php

namespace App\Http\Resources\Defect;

use App\Http\Resources\DefectValue\DefectValueResource;
use App\Models\DefectValue;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DefectResource extends JsonResource
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
            'detail_id' => $this->detail_id,
            'group_id' => $this->group_id,
            'name' => $this->name,
            'type' => $this->type,
            'is_option' => $this->is_option,
            'values' => $this->when(
                $this->values->whereNotNull('name')->isNotEmpty(),
                fn() => DefectValueResource::collection($this->values)->resolve()
            ),
            'measure_unit' => $this->when(
                $this->values->whereNotNull('measure_unit')->isNotEmpty(),
                fn() => $this->values->firstWhere('measure_unit', '!=', null)->measure_unit
            ),
        ];
    }
}
