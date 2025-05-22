<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table='details';
    protected $guarded = false;

    public function defects() {
        return $this->hasMany(Defect::class);
    }
}
