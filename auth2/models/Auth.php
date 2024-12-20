<?php

class Auth extends Common
{
    protected $table = 'users';

    public function loginUser($name, $password)
    {
        $sql = "SELECT * FROM $this->table WHERE name = :name AND password = :password";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':name' => $name,
            ":password" => $password
        ]);

        return $stmt->fetch();
    }


    public function registerUser($name, $password)
    {

        $sql = "INSERT INTO $this->table (name ,password) VALUES (:name, :password) ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':name' => $name,
            ':password' => $password
        ]);

        return true;
    }


    public function isUserTaken($name)
    {
        $sql = "SELECT COUNT(*) FROM $this->table WHERE name = :name";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':name' => $name
        ]);

        return $stmt->fetchColumn() > 0;
    }
}
