<?php

require_once 'connection/connectionToDB.php';

class User {
    private $db;
    private int $id;
    private string $fullName;
    private string $email;
    private int $age;
    private string $password;

    public function __construct() {
        global $connection;
        $this->db = $connection;
    }

    public function getId() {
        return $this->id;
    }

    public function setDetails($fullName, $email, $age, $password) {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->age = $age;
        $this->password = $password;
    }

    public function register() {
        if ($this->emailExists($this->email)) {
            return false;
        }

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO User (FullName, Email, Age, Password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$this->fullName, $this->email, $this->age, $hashedPassword]);

        $this->id = $this->db->lastInsertId();

        return true;
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM User WHERE Email = ? LIMIT 1");
        $stmt->execute([$email]);

        if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $user['Password'])) {
                session_regenerate_id();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['FullName'];
                $_SESSION['Active'] = true;
                $this->id = $user['id'];

                return true;
            }
        }
        return false;
    }

    public function emailExists($email) {
        $stmt = $this->db->prepare("SELECT id FROM User WHERE Email = ? LIMIT 1");
        $stmt->execute([$email]);
        return (bool)$stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserDetails($id) {
        $stmt = $this->db->prepare("SELECT * FROM User WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function changePassword($id, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE User SET Password = ? WHERE id = ?");
        $stmt->execute([$hashedPassword, $id]);
    }
}
?>