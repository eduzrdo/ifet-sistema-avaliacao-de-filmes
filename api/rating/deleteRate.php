<?php
require_once '../../classes/System.php';

session_start();
$isAuthenticated = count($_SESSION) > 0;

$system = new System();

$ratingId = $_GET["ratingId"];
$movieId = $_GET["movieId"];
$userId = $_SESSION["userId"];

$system->deleteRating($userId, intval($ratingId), intval($movieId));

echo '<pre>';
var_dump($system->getRatings());
var_dump($system->findMovie(intval($movieId))[1]->getRatings()[intval($ratingId)]);
echo '</pre>';


// header('Location: ../../filme.php?movieId=' . $movieId);
