<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Complete extends Model
{
    use HasFactory;


    // function to get today finished tasks for the logged in user
    static function get_finished_tasks($task_id) {
        $tasks = Complete::where('user_id', Auth::user()->id)->where('task_id', $task_id);

        if ( $tasks->count() < 1 ) {
            return null;
        }else {
            $finished = array();
            foreach ($tasks->get() as $task) {
                array_push($task->task_id, $finished);
            }

            return $finished;
        }
        
    }

}
