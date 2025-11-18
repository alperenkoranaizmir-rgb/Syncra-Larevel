<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->mapRoutes();
    }

    /**
     * Register application routes.
     */
    protected function mapRoutes(): void
    {
        if (file_exists(base_path('routes/web.php'))) {
            Route::middleware('web')->group(base_path('routes/web.php'));
        }

        if (file_exists(base_path('routes/api.php'))) {
            Route::prefix('api')->middleware('api')->group(base_path('routes/api.php'));
        }
    }
}
