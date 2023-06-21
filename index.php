<?php
require_once './classes/System.php';
require_once './classes/User.php';

$system = new System();

$user = new User("Eduardo", "eduardoliveira.dev@gmail.com", "umasenhamuitofortona");

echo '<pre>';
var_dump($user->getId());
echo '</pre>';
