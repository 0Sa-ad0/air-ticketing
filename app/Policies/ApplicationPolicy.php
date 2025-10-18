<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Application;

class ApplicationPolicy
{
    public function view(User $user, Application $application)
    {
        return $user->id === $application->user_id || $user->isAdmin();
    }

    public function update(User $user, Application $application)
    {
        return $user->id === $application->user_id;
    }

    public function delete(User $user, Application $application)
    {
        return $user->id === $application->user_id;
    }
}