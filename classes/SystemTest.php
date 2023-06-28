<?php

use PHPUnit\Framework\TestCase;

require_once './System.php';
require_once './User.php';

class SystemTest extends TestCase
{
  function testCreateUser()
  {
    $system = new System();
    $user = new User("Usuário", "user@email.com", "123456");
    $system->createUser($user);

    $userInSystem = $system->findUser("user@email.com");

    $this->assertEquals($user->getEmail(), $userInSystem->getEmail());
  }

  function testFailToCreateUser()
  {
    $system = new System();
    $user1 = new User("Usuário", "user@email.com", "123456");
    $user2 = new User("Usuário", "user@email.com", "123456");

    $system->createUser($user1);
    $result = $system->createUser($user2);

    $this->assertEquals(false, $result[0]);
  }
}
