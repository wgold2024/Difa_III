<?php

namespace App\Http\Resources\Input;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InputResource extends JsonResource
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
            'op' => $this->op,
            'city' => $this->city,
            'company' => $this->company,
            'field' => $this->field,
            'cluster' => $this->cluster,
            'well' => $this->well,
            'created_at' => Carbon::parse($this->created_at)->format('d.m.Y H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d.m.Y H:i:s'),
//            'installation_date_at' => $this->installation_date_at,
//            'start_date_at' => $this->start_date_at,
//            'stop_date_at' => $this->stop_date_at,
//            'dismantling_date_at' => $this->dismantling_date_at,
//            'analysis_date_at' => $this->analysis_date_at,
//            'operating_time' => $this->operating_time,
//            'stop_reason' => $this->stop_reason,
//            'mode' => $this->mode,
//            'user_id' => $this->user_id,
            'user_name' => $this->user->name ?? '',
            'user_email' => $this->user->email ?? '',
//            'docs' => $this->documents,
//            'sl_key' => $this->sl_key,
//            'note' => $this->note,
        ];
    }
}
