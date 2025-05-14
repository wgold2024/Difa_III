<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $table = 'inputs';
    protected $guarded = false;

    protected $casts = [
        'documents' => 'array'
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
