<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // If no authenticated user, block access
        if (! $user) {
            abort(403, 'Unauthorized.');
        }

        // If the Spatie Permission methods are available on the User model, prefer them.
        // This allows role/permission checks once `spatie/laravel-permission` is installed
        // and the `HasRoles` trait added to `App\Models\User`.
        if (method_exists($user, 'hasRole')) {
            if ($user->hasRole('admin') || $user->hasAnyRole(['admin', 'super-admin'])) {
                return $next($request);
            }
            abort(403, 'Unauthorized.');
        }

        // Fallback for installations that haven't enabled spatie yet: use `is_admin` flag
        if (! ($user->is_admin ?? false)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
