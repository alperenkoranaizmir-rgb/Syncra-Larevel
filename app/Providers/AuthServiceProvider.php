<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->policies = [
            User::class => UserPolicy::class,
        ];

        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }
    }
}
