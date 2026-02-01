<?php
class User {
    private $conn;
    private $table_name = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $email, $password) {

      
        $checkQuery = "SELECT id FROM {$this->table_name} WHERE email = :email";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->execute([':email' => $email]);

        if ($checkStmt->rowCount() > 0) {
            return "EMAIL_EXISTS";
        }

       
        $hashed = password_hash($password, PASSWORD_DEFAULT);

       
        $query = "INSERT INTO {$this->table_name} 
                  (name, email, password, role)
                  VALUES (:name, :email, :password, 'user')";

        $stmt = $this->conn->prepare($query);

        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashed
        ]);

        return true;
    }

    public function login($email, $password) {
        $query = "SELECT id, name, email, password, role 
                  FROM {$this->table_name} 
                  WHERE email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([':email' => $email]);

        if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}
?>
