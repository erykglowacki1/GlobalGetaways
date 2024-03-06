<?php

class User
{
    public $userId; //primary key
    public $userName;
    public $userEmail;
    public $useAge;
    public $userPassword;
    public $milesId; //foreign key

    public function __construct($userId, $userName, $userEmail, $useAge, $userPassword, $milesId)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->useAge = $useAge;
        $this->userPassword = $userPassword;
        $this->milesId = $milesId;
    }
    //getters
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

    //setters
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }
    public function setUseAge($useAge)
    {
        $this->useAge = $useAge;
    }
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;
    }
    public function setMilesId($milesId)
    {
        $this->milesId = $milesId;
    }

}
?>