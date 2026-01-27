<?php
class User {
    private $conn;
    private $table_name = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register(  $name, $email, $password) {
        $query = "INSERT INTO {$this->table_name} 
                  (name, email, password, role)
                  VALUES (:name, :email, :password, 'user')";

        $stmt = $this->conn->prepare($query);

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashed
        ]);
    }

    public function login($email, $password) {
        $query = "SELECT id, name, email, password, role 
                  FROM {$this->table_name} 
                  WHERE email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([':email' => $email]);

        if ($user = $stmt->fetch()) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}
?>