<?php
require_once 'classes/System.php';
$system = new System();

session_start();

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

echo '<pre>';
var_dump($system->findMovie(177572)[1]->getRatings());
echo '</pre>';
