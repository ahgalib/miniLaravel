<?php

namespace App\Http;

use Core\Request;
use Core\Response;
use Core\Route;

class Kernel
{
    // Later we can register global middlewares here
    protected array $middleware = [];

    public function handle(Request $request): Response
    {
        // 🔁 Here you can add middleware pipeline (later)

        // Dispatch route
        $response = Route::dispatch($request->uri(), $request->method());

        return new Response($response);
    }

    public function terminate(Request $request, Response $response): void
    {
        // Placeholder for terminate middlewares (e.g., logging)
    }
}
