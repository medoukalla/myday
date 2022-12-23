<?php

namespace App\Http\Controllers;

use App\Models\Complete;
use App\Models\Task;
use Illuminate\Http\Request;
use Auth;

class CompleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Make specified task as completed
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function finished(Task $task)
    {
        // check if task exists in complete tasks for today or not 
        $check = Complete::where('task_id', $task->id)->where('user_id', Auth::user()->id)->count();

        // if check == 0 ( Means task not done today yet )
        if ( $check == 0 ) {
            $newComplete = new Complete();
            $newComplete->task_id = $task->id;
            $newComplete->user_id = Auth::user()->id;

            if ($newComplete->save()) {
                return response()->json([
                    'status'  => 'success',
                    'redirect' => route('group.show', $task->group->id)
                ], 200);
            }else {
                return response()->json([
                    'status'  => 'error',
                    'redirect' => route('group.show', $task->group->id)
                ], 200);
            }
        }else {
            return response()->json([
                'status'  => 'error',
                'redirect' => route('group.show', $task->group->id)
            ], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complete  $complete
     * @return \Illuminate\Http\Response
     */
    public function show(Complete $complete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complete  $complete
     * @return \Illuminate\Http\Response
     */
    public function edit(Complete $complete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complete  $complete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complete $complete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complete  $complete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complete $complete)
    {
        //
    }
}
