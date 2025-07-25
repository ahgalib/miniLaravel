<?php

class Database{
    // private static $connection;
    // public static function getConnection(){

    //     if(!self::$connection){
    //         $host = "localhost";
    //         $db = "finance_buddy";
    //         $user = "root";
    //         $password = "";
    //         $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

    //         try {
    //             self::$connection = new PDO($dsn, $user, $password);
    //             self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         } catch (PDOException $e) {
    //             die("Database connection failed: " . $e->getMessage());
    //         }
    //     }

    //     return self::$connection;
    // }

    protected \PDO $pdo;

    public function __construct($host, $user, $password, $dbname)
    {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $this->pdo = new \PDO($dsn, $user, $password);
    }

    public function query(string $sql)
    {
        return $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
}