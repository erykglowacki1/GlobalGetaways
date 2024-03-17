<?php

class User
{
    protected $id;
    protected $userName;
    protected $userEmail;
    protected $useAge;
    protected $userPassword;
    protected $milesId;

    public function __construct($id, $userName, $userEmail, $useAge, $userPassword, $milesId)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->useAge = $useAge;
        $this->userPassword = $userPassword;
        $this->milesId = $milesId;
    }

    public function getId()
    {
        return $this->id;
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