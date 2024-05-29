<?php

namespace App;

use PDO;

class Database
{
    protected static $_instance;
    protected PDO $connection;

    public function __construct()
    {
        $dbConfig = Config::getInstance()->getValue('db');
        $dsn = $dbConfig['host'] . ';' . 'dbname=' . $dbConfig['database'];
        $this->connection = new PDO($dsn, $dbConfig['username'], $dbConfig['password']);
    }

    public static function getInstance(): Database
    {
        if (!self::$_instance) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    public function fetch(string $query, array $params = [])
    {
        try {
            return $this->query($query, $params)->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            throw new \PDOException($exception->getMessage(), (int)$exception->getCode(), $exception);
        }
    }

    public function fetchAll(string $query, array $params = [])
    {
        try {
            return $this->query($query, $params)->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            throw new \PDOException($exception->getMessage(), (int)$exception->getCode(), $exception);
        }
    }

    public function execute(string $query, array $params = [])
    {
        try {
            return $this->query($query, $params)->rowCount();
        } catch (\PDOException $exception) {
            throw new \PDOException($exception->getMessage(), (int)$exception->getCode(), $exception);
        }
    }

    public function getLastInsertId()
    {
        return $this->connection->lastInsertId();
    }

    protected function query(string $query, array $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);

            $stmt->execute($params);

            return $stmt;
        } catch (\PDOException $exception) {
            throw new \PDOException($exception->getMessage(), (int)$exception->getCode(), $exception);
        }
    }
}