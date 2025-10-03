<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $fillable = [
        'user_id',
        'session_id',
        'ip_address',
        'user_agent',
        'logged_in_at',
        'logged_out_at',
        'session_expired_at'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }
}
