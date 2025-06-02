<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $table = 'inputs';
    protected $guarded = false;

    protected $dates = [
        'installation_date_at',
        'start_date_at',
        'stop_date_at',
    ];

//    protected $casts = [
//        'documents' => 'array'
//    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pumps()
    {
        return $this->hasMany(DefectData::class)->where('unit', 'Pump');
    }

    public function motors()
    {
        return $this->hasMany(DefectData::class)->where('unit', 'Motor');
    }
}
