<?php

class adminAuthenticator {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function authenticateUser($email, $password) {
        $sql = "SELECT User.*, Admin.accessLevel FROM User INNER JOIN Admin ON User.id = Admin.User_id WHERE User.Email = :email";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['Password']) {
            if ($user['accessLevel'] == 1) {
                return new Admin(
                );
            } else {
                return new User(
                );
            }
        } else {
            return null;
        }
    }
}
?>