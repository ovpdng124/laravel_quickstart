<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * List a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy($user, $task)
    {
        return $user->id === $task->user_id;
    }
}
