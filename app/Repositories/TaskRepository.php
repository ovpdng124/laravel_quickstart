<?php

namespace App\Repositories;

use App\Model\Task;
use App\Model\User;
use Gate;
use Log;
use Exception;

class TaskRepository
{
    public function listOwnTasks(User $user)
    {
        return $user->tasks()->orderBy('created_at')->get();
    }

    public function store($params)
    {
        try {
            Task::create($params);

            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $task = Task::find($id);

            if (Gate::allows('destroy', $task)) {
                $task->delete();

                return [true, trans('messages.delete_success')];
            }

            return [false, trans('messages.action_unauthorized')];
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return [false, trans('messages.delete_failed')];
        }
    }
}
