<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function before(User $user, $ability)
    {
        if (method_exists($user, 'hasRole') && ($user->hasRole('admin') || $user->is_admin)) {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return $user->hasRole('admin') || $user->is_admin;
    }

    public function view(User $user, User $model)
    {
        return $user->hasRole('admin') || $user->is_admin || $user->id === $model->id;
    }

    public function create(User $user)
    {
        return $user->hasRole('admin') || $user->is_admin;
    }

    public function update(User $user, User $model)
    {
        return $user->hasRole('admin') || $user->is_admin || $user->id === $model->id;
    }

    public function delete(User $user, User $model)
    {
        return $user->hasRole('admin') || $user->is_admin;
    }
}
