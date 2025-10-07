<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $table = 'user_groups';

    protected $guarded = false;


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_group', 'group_id', 'user_id')
            ->withTimestamps();
    }

    public function parent()
    {
        return $this->belongsTo(UserGroup::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(UserGroup::class, 'parent_id');
    }
}
