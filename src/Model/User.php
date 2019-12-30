<?php


class User
{
    private $id;
    private $alias;
    private $password;
    private $name;
    private $surname;
    private $email;
    private $userType;
    private $cookieCode;


    public function __construct($id, $alias, $password, $name, $surname, $email, $userType)
    {
        $this->id = $id;
        $this->alias = $alias;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->userType = $userType;
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
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @return mixed
     */
    public function getCookieCode()
    {
        return $this->cookieCode;
    }

    /**
     * @param mixed $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    /**
     * @param mixed $cookieCode
     */
    public function setCookieCode($cookieCode)
    {
        $this->cookieCode = $cookieCode;
    }



}