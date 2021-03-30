<?php

include_once 'app/src/model/dbo.php';
class UserController
{
    private $dbo;

    public function __construct($dbo)
    {
        $this->dbo = $dbo;
    }

    public function getAll()
    {
        return $this->dbo->selectAll();
    }

    public function getById($id)
    {
        return $this->dbo->selectById($id);
    }

    public function save($fname, $lname, $email)
    {
        return $this->dbo->insertUser($fname, $lname, $email);
    }
}
