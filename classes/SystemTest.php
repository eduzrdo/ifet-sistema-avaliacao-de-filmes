<?php

use PHPUnit\Framework\TestCase;

require_once './System.php';
require_once './User.php';
require_once './Movie.php';
require_once './Rating.php';

class SystemTest extends TestCase
{
  function testCreateUser()
  {
    $system = new System();
    $user = new User("Usuário", "user@email.com", "123456");
    $system->createUser($user);

    $userInSystem = $system->findUser("user@email.com");

    $this->assertEquals($user->getEmail(), $userInSystem[1]->getEmail());
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

  function testCreateMovie()
  {
    $system = new System();
    $movie = new Movie("Harry Potter e o Prisioneiro de Azkaban", "urlDaImagem");

    $system->createMovie($movie);

    $this->assertEquals(1, count($system->getMovies()));
  }

  function testCreateRatingAndMovie()
  {
    $system = new System();
    $user = new User("Usuário", "user@email.com", "123456");
    $movie = new Movie("Harry Potter e o Prisioneiro de Azkaban", "urlDaImagem");
    $rating = new Rating($user, $movie, 3, "O melhor filme da saga!!");

    $system->createMovie($movie);
    $system->createRating($rating);
    $system->createRating($rating);

    $this->assertEquals(2, count($system->getRatings()));
    $this->assertEquals(1, count($system->getMovies()));
  }

  function testFindUser()
  {
    $system = new System();
    $user = new User("Usuário", "user@email.com", "123456");
    $system->createUser($user);

    $result = $system->findUser("user@email.com");

    $this->assertEquals(true, $result[0]);
  }

  function testFailToFindUser()
  {
    $system = new System();
    $user = new User("Usuário", "user@email.com", "123456");
    $system->createUser($user);

    $result = $system->findUser("otherUser@email.com");

    $this->assertEquals(false, $result[0]);
  }

  function testAuthUser()
  {
    $system = new System();
    $user = new User("Usuário", "user@email.com", "123456");
    $system->createUser($user);

    $result = $system->authUser("user@email.com", "123456");

    $this->assertEquals(true, $result[0]);
  }

  function testFailToAuthUser()
  {
    $system = new System();
    $user = new User("Usuário", "user@email.com", "123456");
    $system->createUser($user);

    $resultWrongEmail = $system->authUser("wrong_email@email.com", "123456");
    $resultWrongPassword = $system->authUser("wrong_email@email.com", "777777");

    $this->assertEquals(false, $resultWrongEmail[0]);
    $this->assertEquals(false, $resultWrongPassword[0]);
  }

  function testFindMovie()
  {
    $system = new System();
    $movie = new Movie("Harry Potter e o Prisioneiro de Azkaban", "urlDaImagem");
    $movieId = $system->createMovie($movie);

    $result = $system->findMovie($movieId);

    $this->assertEquals(true, $result[0]);
  }

  function testFailToFindMovie()
  {
    $system = new System();
    $movie = new Movie("Harry Potter e o Prisioneiro de Azkaban", "urlDaImagem");
    $movieId = $system->createMovie($movie);
    $wrongMovieId = 10;

    $result = $system->findMovie($wrongMovieId);

    $this->assertEquals(false, $result[0]);
  }

  function testSearchMovie()
  {
    $system = new System();
    $result = $system->searchMovie("Harry Potter");

    print($result[1]->results[0]->title);
    $this->assertEquals(true, $result[0]);
  }
}
