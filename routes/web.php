<?php

use Core\Route;
use App\Controllers\ExpenseController;
use App\Controllers\HomeController;
use App\Controllers\AuthController;


Route::get('/products', [ExpenseController::class, 'index']);
Route::get('/logins', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticate']);






// use App\Controllers\HomeController;
// use App\Controllers\AuthController;
// use App\Controllers\ExpenseController;
// use App\Middleware\AuthMiddleware;



// $routes = [
//     ['method' => 'GET', 'uri' => 'login', 'action' => [AuthController::class, 'index'], 'middleware' => \App\Middleware\LoginMiddleware::class],
//     ['method' => 'POST', 'uri' => 'login', 'action' => [AuthController::class, 'authenticate']],
//     ['method' => 'GET', 'uri' => 'logout', 'action' => [AuthController::class, 'logout'], 'middleware' => \App\Middleware\LoginMiddleware::class],
//     ['method' => 'GET', 'uri' => 'dashboard', 'action' => [ExpenseController::class, 'dashboard']],
//     ['method' => 'GET', 'uri' => 'add-expense', 'action' => [ExpenseController::class, 'expense'], 'middleware' => \App\Middleware\AuthMiddleware::class],
//     ['method' => 'POST', 'uri' => 'save-expense', 'action' => [ExpenseController::class, 'addExpense'], 'middleware' => \App\Middleware\AuthMiddleware::class],
//     ['method' => 'GET', 'uri' => 'show-expense', 'action' => [ExpenseController::class, 'showExpense'], 'middleware' => \App\Middleware\AuthMiddleware::class],


//     ['method' => 'GET', 'uri' => 'edit-expense/{id}', 'action' => [ExpenseController::class, 'editExpense'], 'middleware' => \App\Middleware\AuthMiddleware::class],

//     ['method' => 'POST', 'uri' => 'update-expense/{id}', 'action' => [ExpenseController::class, 'updateExpense'], 'middleware' => \App\Middleware\AuthMiddleware::class],
// ];



// Get current URI
// $basePath = '/financebuddy';
// $uri = str_replace($basePath, '', $_SERVER['REQUEST_URI']);
// $uri = trim($uri, '/');
// $method = $_SERVER['REQUEST_METHOD']; 

// // Match route
// foreach ($routes as $route) {
//     // Check if HTTP method matches
//     if ($method !== $route['method']) {
//         continue;
//     }
   
//     // Convert {id} to a regex pattern
//     $pattern = preg_replace('/\{[a-z]+\}/', '([a-zA-Z0-9-_]+)', $route['uri']); 
//     if (preg_match("#^$pattern$#", $uri, $matches)) {
//         array_shift($matches); // Remove the full match

//         //check the route is middleware protected or not
//         if(isset($route['middleware'])){
//             $middlewareClass =  $route['middleware'];
//             $middleware = new $middlewareClass();
//             $middleware->handle();         
//         }


//         [$controller, $method] = $route['action'];
//         $controllerInstance = new $controller();
//         echo call_user_func_array([$controllerInstance, $method], $matches);
//         exit;
//     }
// }

// // If no route matches
// http_response_code(404);
// echo "404 - Page not found";