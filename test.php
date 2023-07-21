<?php
require_once 'classes/System.php';

$system = new System();
unset($system->findMovie(intval("673"))[1]->getRatings()[0]);

echo '<pre>';
var_dump($system->getRatings());
var_dump($system->findMovie(intval("673"))[1]->getRatings()[0]);
var_dump($system->getMovies());
echo '</pre>';
