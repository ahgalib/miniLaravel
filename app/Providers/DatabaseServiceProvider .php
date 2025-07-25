<?php

namespace App\Providers;

use Database;
use Core\ServiceProvider;
use Core\Database\Connection;

class DatabaseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('db', function () {
            $host = "localhost";
                    $db_name = "finance_buddy";
                    $user = "root";
                    $password = "";
                    // $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
           
            return new Database($host, $user, $password, $db_name);
        });
    }
}


