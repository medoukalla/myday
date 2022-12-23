<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;


    static function get_active_groups() {
        return Group::where('active', true)->orderBy('id', 'asc')->get();
    }


    /**
     * Get all of the tasks for the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
