<?php

use App\Http\Kernel;
use Core\Request;

require_once __DIR__ . '/../app/Helpers/viewHelper.php';  
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap/app.php';

// die('This is the index.php file');
// use Core\Route;
require __DIR__ . '/../routes/web.php';




// Route::dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);


$request = new Request();

// Resolve the Kernel from the container
$kernel = $app->resolve('kernel'); // OR $GLOBALS['app']->resolve('kernel')

$response = $kernel->handle($request);

$response->send();

$kernel->terminate($request, $response);