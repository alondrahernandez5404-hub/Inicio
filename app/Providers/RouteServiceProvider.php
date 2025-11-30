<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * La ruta a la que los usuarios serán redirigidos después de iniciar sesión.
     */
    public const HOME = '/home'; // <-- Aquí defines la constante HOME

    /**
     * Define la configuración de rutas del proyecto.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        });
    }

    /**
     * Configura la limitación de solicitudes si usas API.
     */
    protected function configureRateLimiting(): void
    {
        //
    }
}
