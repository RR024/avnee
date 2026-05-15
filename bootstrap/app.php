<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$builder = Application::configure(basePath: dirname(__DIR__));

$runtimeEnv = $_SERVER['APP_ENV'] ?? $_ENV['APP_ENV'] ?? getenv('APP_ENV') ?: null;

if ($runtimeEnv === 'local' && is_file(__DIR__.'/../local.env')) {
    // Use a separate env file for local development when APP_ENV=local.
    $builder->create()->loadEnvironmentFrom('local.env');
}

return $builder
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Trust reverse proxies (e.g., Cloudflare tunnel) for correct scheme detection.
        $middleware->trustProxies(at: '*');

        $middleware->alias([
            'admin' => \App\Http\Middleware\IsAdmin::class,
            'active.customer' => \App\Http\Middleware\EnsureCustomerIsActive::class,
            'admin.permission' => \App\Http\Middleware\EnsureAdminPermission::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            'webhooks/shiprocket',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
