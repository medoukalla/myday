<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;



    static function get_group_active_tasks($group_id) {
        $tasks = Task::where('group_id', $group_id);
        if ( $tasks->count() == 0 ) {
            return null;
        }else {
            return $tasks->orderBy('id', 'desc')->get();
        }
    }


    /**
     * Get the group that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group() {
        return $this->belongsTo(Group::class);
    }


}
