<?php
require_once 'User.php';

class Admin extends User
{
    private $accessLevel;

    public function setAccessLevel($accessLevel)
    {
        $this->accessLevel = $accessLevel;
    }

    public function getAccessLevel()
    {
        return $this->accessLevel;
    }

    public function login($email, $password) {
        $loginSuccess = parent::login($email, $password);
        if ($loginSuccess) {
            $this->setAccessLevel(1);

            return true;
        }
        return false;
    }
}
?>