<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @var TaskRepository
     */
    protected $tasks;

    public function __construct()
    {
        $this->middleware('auth');

        $this->tasks = app('tasks');
    }

    public function index(Request $request)
    {
        $tasks = $this->tasks->listOwnTasks($request->user());

        return view("tasks.index", compact('tasks'));
    }

    public function store(CreateTaskRequest $request)
    {
        $params = $request->only('name');

        $params['user_id'] = $request->user()->id;

        $status = $this->tasks->store($params);

        if ($status) {
            return redirect(route('tasks.index'));
        }

        return redirect()->back()->withErrors('Created failed!');
    }

    public function destroy($id)
    {
        $status = $this->tasks->destroy($id);

        if ($status) {
            return response()->json('Deleted Success');
        }

        return response()->json('Deleted Failed');
    }
}
