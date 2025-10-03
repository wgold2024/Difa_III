<?php

namespace App\Http\Resources\Session;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
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
            'user_id' => $this->user_id,
            'userName' => $this->user->name ?? 'Нет пользователя',
            'ip_address' => $this->ip_address,
            'user_agent' => $this->user_agent,
            'payload' => $this->payload,
            'last_activity' => date('Y-m-d H:i:s', $this->last_activity),
            'is_active' => $this->id === $request->session()->getId() ? 'Да' : 'Нет',
        ];
    }
}
