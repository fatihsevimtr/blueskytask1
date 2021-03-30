<?php

use PHPUnit\Framework\TestCase;

include_once 'app/src/controllers/usercontroller.php';

class UserControllerTest extends TestCase
{
    public function testGetById($id)
    {
        $userController = new UserController(new Dbo());
        $this->assertEquals(2, $userController->getById($id));
    }
}
