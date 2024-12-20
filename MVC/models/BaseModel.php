<?php

class BaseModel
{
    protected $table;
    protected $pdo;


    public function __construct()
    {
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8', DB_HOST, DB_POST, DB_NAME);

        try {
            $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, DB_OPTIONS);
        } catch (PDOException $e) {
            die('Kết lỗi cơ sở dữ liệu thất bại' . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }


    public function select($columns = "*", $conditions = null, $params = [])
    {
        $sql = "SELECT $columns FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetchAll();
    }


    public function count($conditions = null, $params = [])
    {
        $sql = "SELECT COUNT(*) FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetchColumn();
    }


    public function paginate($page = 1, $perPage = 3, $columns = "*", $conditions = null, $params = [])
    {
        $sql = "SELECT $columns FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $offset = ($page - 1) * $perPage;

        $sql .= "LIMIT $perPage OFFSET $offset";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetchAll();
    }


    public function find($columns = "*", $conditions = null, $params = [])
    {
        $sql = "SELECT $columns FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetch();
    }



    public function insert($data)
    {
        $keys = array_keys($data);

        $columns = implode(', ', $keys);

        $placeholders = ':' . implode(', :', $keys);

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($data);

        return $this->pdo->lastInsertId();
    }

    public function update($data, $conditions = null, $params = [])
    {
        $keys = array_keys($data);

        $arraySets = array_map(fn($key) => "$key = :set_$key", $keys);

        $sets = implode(", ", $arraySets);

        $sql = "UPDATE {$this->table} SET $sets";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $key => &$value) {
            $stmt->bindParam(":set_$key", $value);
        }

        foreach ($params as $key => &$value) {
            $stmt->bindParam(":$key", $value);
        }

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function delete($conditions = null, $params = [])
    {
        $sql = "DELETE FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->rowCount();
    }
}
