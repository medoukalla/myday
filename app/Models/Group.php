<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

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

    /**
     * function to calculate the number of tasks user completed in specify group
     */
    public function complete() {
        return $this->hasMany(Complete::class)->whereDay('created_at', Carbon::today())->where('user_id', Auth::user()->id);
    }
}
