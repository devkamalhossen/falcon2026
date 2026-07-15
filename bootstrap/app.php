<?php

use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Middleware\PermissionMiddleware;
use Illuminate\Foundation\Application;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::prefix('admin/')
                ->middleware('web')
                ->group(base_path('routes/admin.php'));
           
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
         $middleware->alias([
            'admin' => AdminAuthMiddleware::class,
            'permission' => PermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //  $exceptions->respond(function (Response $response) {
        //     if ($response->getStatusCode() === 404) {
        //         return errorResponse("Data not found!", 404);
        //     }
        //     return $response;
        // });
    })->create();
