<?php
require_once '../../classes/System.php';
require_once '../../classes/Movie.php';
require_once '../../classes/Rating.php';
require_once '../../services/movie.php';

session_start();

$system = new System();

$email = $_SESSION['userEmail'];
$userResponse = $system->findUser($email);

if ($userResponse[0] === false) {
  // Fazer algo se o usuário logado por algum
  // motivo não existe no banco de dados
  exit();
}

$score = $_POST['score'];
$comment = $_POST['comment'];
$movieId = $_GET['movieId'];

$movieData = getMovieFromApi($movieId);

// echo '<pre>';
// var_dump($movieData[1]);
// echo '</pre>';

$movie = new Movie($movieData[1]->id, $movieData[1]->title, $movieData[1]->poster_path, $movieData[1]->backdrop_path);
$rating = new Rating($userResponse[1], $movie, intval($score), $comment);
$system->createRating($rating);

echo '<pre>';
var_dump($system);
echo '</pre>';
