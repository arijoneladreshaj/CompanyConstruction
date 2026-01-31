<?php
require_once 'Database.php';

class ContactRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function insertMessage($name, $email, $subject, $message) {
        $sql = "INSERT INTO contact_messages (name, email, subject, message)
                VALUES (:name, :email, :subject, :message)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);
    }
}
