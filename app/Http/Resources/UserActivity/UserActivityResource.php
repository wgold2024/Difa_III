<?php

namespace App\Http\Resources\UserActivity;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserActivityResource extends JsonResource
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
            'session_id' => $this->session_id,
            'user_id' => $this->user_id,
            'userName' => $this->user->name ?? 'Нет пользователя',
            'ip_address' => $this->ip_address,
            'user_agent' => $this->user_agent,
            'logged_in_at' => $this->logged_in_at,
            'logged_out_at' => $this->logged_out_at,
//            'session_expired_at' => $this->session_expired_at,
            'session_expired_at' => $this->session_expired_at ? date('Y-m-d H:i:s', $this->session_expired_at) : '',
        ];
    }
}
