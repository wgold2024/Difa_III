<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions'; // имя таблицы
    protected $primaryKey = 'id';  // id — строковый
    public $incrementing = false;  // потому что id не автоинкремент
    protected $keyType = 'string'; // id — строка

    protected $fillable = [
        'id',
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
