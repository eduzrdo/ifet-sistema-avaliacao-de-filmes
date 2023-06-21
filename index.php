<?php
require_once './classes/System.php';
require_once './classes/User.php';

$system = new System();

$user = new User("Eduardo", "eduardoliveira.dev@gmail.com", "umasenhamuitofortona");
$user2 = new User("Luiz Eduardo", "lefn@hotmail.com.br", "senhafracakkk");

// $system->createUser($user);
// $system->createUser($user2);

echo '<pre>';
var_dump($system);
echo '</pre>';
