<?php

namespace Core;

use \PDO;

class DB
{
    private PDO $pdo;

    public function __construct(array $config)
    {
        $defaultOptions = [PDO::ATTR_EMULATE_PREPARES => false,
                           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
                           
        $this->pdo = new PDO($config['driver'] . ':' . 'host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';port=' . $config['port'],
        $config['user'],
        $config['pswrd'],
        $config['options'] ?? $defaultOptions);
    }

    public function query($stmt, $params = [])
    {
        $stmt = $this->pdo->prepare($stmt);
        $stmt->execute($params);

        return $stmt->fetchAll();
    }

    public function queryOne($stmt, $params = [])
    {
        $stmt = $this->pdo->prepare($stmt);
        $stmt->execute($params);

        return $stmt->fetch();
    }
}