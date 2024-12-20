<?php


class Auth extends Common
{
    protected $table = "users";

    public function loginUser($name, $password)
    {

        $sql = "SELECT * FROM $this->table WHERE name = :name AND password = :password ";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'name' => $name,
            'password' => $password
        ]);

        return $stmt->fetch();
    }

    public function registerUser($name, $password)
    {

        // Kiểm tra xem tên người dùng đã tồn tại hay chưa
        if ($this->isUsernameTaken($name)) {
            throw new Exception("Tên tài khoản đã tồn tại, vui lòng chọn tên khác");
        }

        // Mã hóa mật khẩu
        $hashedPassword = password_hash($password,  PASSWORD_BCRYPT);
        $sql = "INSERT INTO $this->table (name,password) VALUES (:name, :password)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ":name" => $name,
            ":password" => $password
        ]);

        return true;
    }

    public function isUsernameTaken($name)
    {
        $sql = "SELECT COUNT(*) FROM $this->table WHERE name = :name";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([':name' => $name]);

        return $stmt->fetchColumn() > 0;
    }
}
