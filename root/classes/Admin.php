<?php
require_once 'User.php';

class Admin extends User
{

    private $id;
private $accessLevel;

public function __construct($id, $userName, $userEmail, $useAge, $userPassword, $milesId)
{
    parent::__construct($id, $userName, $userEmail, $useAge, $userPassword, $milesId);
}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAccessLevel()
    {
        return $this->accessLevel;
    }



}