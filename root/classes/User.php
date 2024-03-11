<?php

class User
{
    private $id; //primary key
    private $userName;
    private $userEmail;
    private $useAge;
    private $userPassword;
    private $milesId;

    /**
     * @param $id
     * @param $userName
     * @param $userEmail
     * @param $useAge
     * @param $userPassword
     * @param $milesId
     */
    public function __construct($id, $userName, $userEmail, $useAge, $userPassword, $milesId)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->useAge = $useAge;
        $this->userPassword = $userPassword;
        $this->milesId = $milesId;
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
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @return mixed
     */
    public function getUseAge()
    {
        return $this->useAge;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * @return mixed
     */
    public function getMilesId()
    {
        return $this->milesId;
    }


}
?>