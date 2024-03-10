<?php

class Admin extends User
{
private $accessLevel;

public function __construct($userId, $userName, $userEmail, $useAge, $userPassword, $milesId,$accessLevel)
{
    parent::__construct($userId, $userName, $userEmail, $useAge, $userPassword, $milesId);
    $this->accessLevel = $accessLevel;
}

    /**
     * @return mixed
     */
    public function getAccessLevel()
    {
        return $this->accessLevel;
    }

}