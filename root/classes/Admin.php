<?php
require_once 'User.php';

class Admin extends User
{
    private $accessLevel;

    public function __construct($id, $userName, $userEmail, $useAge, $userPassword, $milesId, $accessLevel) {
        parent::__construct($id, $userName, $userEmail, $useAge, $userPassword, $milesId);
        $this->accessLevel = $accessLevel;
    }

    public function getAccessLevel()
    {
        return $this->accessLevel;
    }
}
?>