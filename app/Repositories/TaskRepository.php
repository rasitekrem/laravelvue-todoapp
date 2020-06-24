<?php

namespace App\Repositories;

use App\Task;
use Illuminate\Support\Facades\Auth;

class TaskRepository
{
    public function All()
    {
        return Task::where([
            ['user_id', '=',  Auth::user()->id],
            ['is_deleted', '=', false]
        ])->get();
    }

    public function store($title)
    {
        return Task::create([
            'user_id' => Auth::user()->id,
            'title' => $title
        ]);
    }

    public function update(Task $task,$data)
    {
        $result = $task->update($data);

        return $result;
    }

    public function updateAll()
    {
        Task::where('user_id', Auth::user()->id)->update(array('completed' => true));

        return response()->json('Updated', 200);
    }

    public function destroy(Task $task)
    {
        $task->is_deleted = true;
        $result = $task->save();

        return $result;
    }

    public function destroyCompleted()
    {
        $result = Task::where([
            ['user_id', Auth::user()->id],
            ['completed', true]
        ])->update(array('is_deleted' => true));

        return $result;
    }
}