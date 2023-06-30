<?php

use PHPUnit\Framework\TestCase;

require_once './System.php';
require_once './User.php';
require_once './Movie.php';
require_once './Rating.php';

class MovieTest extends TestCase
{
  function testAddRatingAndCalculateAverage()
  {
    $user = new User("Usuário", "user@email.com", "123456");
    $movie = new Movie("Harry Potter e o Prisioneiro de Azkaban", "urlDaImagem");
    new Rating($user, $movie, 3, "O melhor filme da saga!!");
    new Rating($user, $movie, 4, "O melhor filme da saga!!");

    $this->assertEquals(3.5, $movie->getAverageScore());
    $this->assertEquals(2, count($movie->getRatings()));
  }
}
