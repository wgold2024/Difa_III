<?php

namespace App\Http\Resources\Esp;

use App\Http\Resources\Defect\DefectResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EspResource extends JsonResource
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
            'name' => $this->name,
            'defects' => DefectResource::collection($this->defects)->resolve(),
        ];
    }
}
