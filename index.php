<?php
require_once './classes/System.php';
require_once './classes/User.php';
require_once './classes/Movie.php';
require_once './classes/Rating.php';
$system = new System();

$user1 = new User("Eduardo", "eduardoliveira.dev@gmail.com", "umasenhamuitofortona");
$movie1 = new Movie("Harry Potter e o Prisioneiro de Azkaban", "urlDaImagem", "sjdfkasd");
$rating1 = new Rating($user1, $movie1, 5, "O melhor filme da saga!!");

$system->createUser($user1);
$system->createMovie($movie1);
$system->createRating($rating1);

echo '<pre>';

echo '<h1>Usuários:</h1>';
var_dump($system->getUsers());

echo '<h1>Filmes:</h1>';
var_dump($system->getMovies());

echo '<h1>Avaliações:</h1>';
var_dump($system->getRatings());

echo '</pre>';
