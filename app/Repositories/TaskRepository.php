<?php

namespace App\Repositories;

use App\Model\Task;
use App\Model\User;
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
            Task::find($id)->delete();

            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    }
}
