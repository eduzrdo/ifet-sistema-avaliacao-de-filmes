<?php
require_once './classes/System.php';
require_once './classes/User.php';
require_once './classes/Movie.php';

$system = new System();

$user1 = new User("Eduardo", "eduardoliveira.dev@gmail.com", "umasenhamuitofortona");
$user2 = new User("Luiz Eduardo", "lefn@hotmail.com.br", "senhafracakkk");

$movie1 = new Movie("Harry Potter e o Prisioneiro de Azkaban", "urlDaImagem", "sjdfkasd");
$movie2 = new Movie("Harry Potter e a Ordem da Fênix", "urlDaImagem", "sjdfkasd");
$movie3 = new Movie("Harry Potter e o Enigma do Príncipe", "urlDaImagem", "sjdfkasd");

// $system->createUser($user1);
// $system->createUser($user2);

// $system->createMovie($movie1);
// $system->createMovie($movie2);
// $system->createMovie($movie3);

echo '<pre>';


// var_dump($system->getUsers());

// $result = $system->findUser("eduardoliveira.dev@gmail.com");

// var_dump($result);

// $auth = $system->authuser("eduardoliveira.dev@gmail.com", "umasenhamuitofortona");

// var_dump($x[1]['name']);

$movie = $system->findMovie(0);

echo '<pre>';
var_dump($movie);
echo '</pre>';


echo '</pre>';
