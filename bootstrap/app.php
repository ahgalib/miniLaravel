<?php

use Core\Container;
use App\Http\Kernel;

// Create container instance
$container = new Container();

// Register service providers here
$provider = new DatabaseServiceProvider($container);
$provider->register();

// Manually bind the Kernel class to the container 
$container->bind('kernel', function () {
    return new Kernel();
});

// Make the container globally accessible
$GLOBALS['app'] = $container;

return $container;
