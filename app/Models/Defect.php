<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Defect extends Model
{
    protected $table='defects';
    protected $guarded = false;

    public function values() {
        return $this->hasMany(DefectValue::class);
    }
}
