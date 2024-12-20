<?php


class Auth extends Common
{
    protected $table = "users";
    

    public function loginUser($name, $password)
    {

        try {
            $sql = "SELECT * FROM $this->table WHERE name = :name AND password = :password ";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                'name' => $name,
                'password' => $password
            ]);

            return $stmt->fetch();
        } catch (\Throwable $th) {
            throw new Exception('Lỗi truy vấn trong loginUser' . $th->getMessage());
        }
    }

    public function registerUser($name, $password)
    {

        try {
            // Kiểm tra xem tên người dùng đã tồn tại hay chưa
            if ($this->isUsernameTaken($name)) {
                throw new Exception("Tên tài khoản đã tồn tại, vui lòng chọn tên khác");
            }

            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password,  PASSWORD_BCRYPT);
            $sql = "INSERT INTO $this->table (name, password) VALUES (:name, :password)";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                ":name" => $name,
                ":password" => $password
            ]);

            return true;
        } catch (\Throwable $th) {
            throw new Exception("Lỗi truy vấn trong registerUser" . $th->getMessage());
        }
    }

    public function isUsernameTaken($name)
    {
        try {
            $sql = "SELECT COUNT(*) FROM $this->table WHERE name = :name";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([':name' => $name]);

            return $stmt->fetchColumn() > 0;
        } catch (\Throwable $th) {
            throw new Exception('Lỗi truy vấn trong isUsernameTaken' . $th->getMessage());
        }
    }
}
