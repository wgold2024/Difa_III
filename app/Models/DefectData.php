<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DefectData extends Model
{
    protected $table='defect_data';
    protected $guarded = false;

    public function input() {
        return $this->belongsTo(Input::class);
    }


}
