<?php

class User
{
    private $userId; //primary key
    private $userName;
    private $userEmail;
    private $useAge;
    private $userPassword;
    private $milesId;

    public function __construct($userId, $userName, $userEmail, $useAge, $userPassword, $milesId)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->useAge = $useAge;
        $this->userPassword = $userPassword;
        $this->milesId = $milesId;
    }
    //getters and setters
    public function getUserId()
    {
        return $this->userId;
    }
    public function getUserName()
    {
        return $this->userName;
    }
    public function getUserEmail()
    {
        return $this->userEmail;
    }
    public function getUseAge()
    {
        return $this->useAge;
    }
    public function getUserPassword()
    {
        return $this->userPassword;
    }
    public function getMilesId()
    {
        return $this->milesId;
    }
}
?>