<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    // During development we avoid relying on the framework's MaintenanceMode binding.
    // Provide a simple pass-through to ensure requests are handled.
    public function handle($request, \Closure $next)
    {
        return $next($request);
    }
}
