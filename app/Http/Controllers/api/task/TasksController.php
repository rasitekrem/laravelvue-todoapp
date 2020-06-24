<?php

namespace App\Http\Controllers\api\task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\Auth;
use App\Task;

class TasksController extends Controller
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->taskRepository->All();
        return $tasks;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
        ]);
        $status = $this->taskRepository->store($request->title);
        return $status;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::user()->id) {
            return response()->json('Unauthorized', 401);
        }

        $data = $request->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean',
        ]);
        
        $this->taskRepository->update($task,$data);

        return response($task, 200);
    }
    /**
     * @return \Illuminate\Http\Response
     */
    public function updateAll()
    {
        $result = $this->taskRepository->updateAll();

        return response($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::user()->id) {
            return response()->json('Unauthorized', 401);
        }

        $response = $this->taskRepository->destroy($task);

        return response()->json('Deleted task item', 200);
    }
    
    /**
     * @return \Illuminate\Http\Response
     */
    public function destroyCompleted()
    {
        $response = $this->taskRepository->destroyCompleted();

        return response($response, 200);
    }
}
