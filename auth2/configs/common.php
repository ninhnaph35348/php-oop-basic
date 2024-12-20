<?php

class Common
{
    protected $table;

    protected $pdo;

    public function __construct()
    {
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset:utf8', DB_HOST, DB_PORT, DB_NAME);

        try {
            $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, DB_OPTIONS);
        } catch (PDOException $e) {
            throw new Exception('Kết nối cơ sở dữ liệu thất bại' . $e->getMessage());
        }
    }
}