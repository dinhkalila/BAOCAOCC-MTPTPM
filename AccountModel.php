<?php
class AccountModel{
    private $conn;
    private $table_name = "account";

    public function __construct($db) {
        $this->conn = $db;
    }

    function getAccountByUsername($email){
        $query = "SELECT * FROM " . $this->table_name . " where email = :email";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":email", $email);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function save($username, $name, $password, $role="user"){

        $query = "INSERT INTO " . $this->table_name . " (email, name, password, role) VALUES (:username, :name, :password, :role)";
        
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $name = htmlspecialchars(strip_tags($name));
        $username = htmlspecialchars(strip_tags($username));

        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}