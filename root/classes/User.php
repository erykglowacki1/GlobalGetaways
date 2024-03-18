<?php

require_once 'connection/connectionToDB.php';

class User {
    private $db;
    private $id = null;

    public function __construct() {
        global $connection;
        $this->db = $connection;
    }

    public function getId() {
        return $this->id;
    }

    public function register($fullName, $email, $age, $password) {
        if ($this->emailExists($email)) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO User (FullName, Email, Age, Password) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $fullName);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $age);
        $stmt->bindParam(4, $hashedPassword);
        if ($stmt->execute()) {
            $this->id = $this->db->lastInsertId();
            $this->fullName = $fullName;
            $this->email = $email;
            $this->age = $age;
            $this->password = $hashedPassword;
            // Assume milesId is set elsewhere or later, as it's not part of registration
            return true;
        }
        return false;
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM User WHERE Email = ? LIMIT 1");
        $stmt->bindParam(1, $email);
        $stmt->execute();

        if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $user['Password'])) {
                session_regenerate_id();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['FullName'];

                $this->id = $user['id'];

                return true;
            }
        }
        return false;
    }


    public function emailExists($email) {
        $stmt = $this->db->prepare("SELECT id FROM User WHERE Email = ? LIMIT 1");
        $stmt->bindParam(1, $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
}
