<?php
class Common
{
    protected $table;
    protected $pdo;

    public function __construct()
    {
        // Data Source Name - DSN
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset:utf8', DB_HOST, DB_PORT, DB_NAME);

        try {
            $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, DB_OPTIONS);
        } catch (PDOException $e) {
            throw new Exception('Lỗi kết nỗi cơ sở dữ liệu' . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
}

$common = new Common();
