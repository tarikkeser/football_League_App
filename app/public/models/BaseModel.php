<?php

/**
 * NOTE! this base model handles initializing PDO
 * 
 * To use PDO in a derived class, use self::$pdo
 */

class BaseModel
{
    protected static $pdo;

    function __construct()
    {
        if (!self::$pdo) {
            $host = getenv("DB_HOST") ?: "mysql";
            $db = getenv("DB_NAME") ?: "developmentdb";
            $user = getenv("DB_USER") ?: "developer";
            $pass = getenv("DB_PASSWORD") ?: "secret123";
            $charset = getenv("DB_CHARSET") ?: "utf8mb4";

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];

            try {
                self::$pdo = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
    }
}
