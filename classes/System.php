<?php

//ROOT constante que armazena o caminho para o diretório raíz do servidor
// E:\xampp\htdocs
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
//PASTASISTEMA constante que armazena o nome da pasta que representa o sistema

define('PASTASISTEMA', 'ifet-sistema-avaliacao-de-filmes');
//PATH constante com o caminho completo até a pasta do sistema (dentro do servidor)
// E:\xampp\htdocs\ifet-sistema-avaliacao-de-filmes
define('PATH', ROOT . '/' . PASTASISTEMA . '/');

class System
{
  //Exemplos de atributos da classe
  //private agencias;
  //private clientes;

  private $users = [];
  private $movies = [];
  private $ratings = [];

  function __construct()
  {
    //Se já existe um sistema serializado carrega ele para o objeto criado
    if (file_exists(PATH . 'database.save')) {
      $data = file_get_contents(PATH . 'database.save');
      $system = unserialize($data);
      //Copia os dados para os atributos
      // $this->users = $system->users;
      // $this->movies = $system->movies;
      // $this->ratings = $system->ratings;
      $this->users = $system->getUsers();
      $this->movies = $system->getMovies();
      $this->ratings = $system->getRatings();
    }
  }

  //Antes de destruir serializa o sistema no servidor
  function __destruct()
  {
    $serializado = serialize($this);
    file_put_contents(PATH . 'database.save', $serializado);
  }

  function getUsers()
  {
    return $this->users;
  }

  function getMovies()
  {
    return $this->movies;
  }

  function getRatings()
  {
    return $this->ratings;
  }

  function createUser($user)
  {
    $this->users[] = $user;

    end($this->users);
    $newId = key($this->users);

    $user->setId($newId);
  }

  function createMovie($movie)
  {
    $this->movies[] = $movie;

    end($this->movies);
    $newId = key($this->movies);

    $movie->setId($newId);
  }

  function createRating($rating)
  {
    $this->ratings[] = $rating;

    end($this->ratings);
    $newId = key($this->ratings);

    $rating->setId($newId);
  }

  private function findUser($email)
  {
    foreach ($this->users as $user) {
      if ($user->getEmail() === $email) {
        return $user;
      }
    }

    return null;
  }

  function authUser($email, $password)
  {
    $user = $this->findUser($email);

    if (!$user) {
      return [false, "E-mail não cadastrado."];
    }

    $verifiedPassword = password_verify($password, $user->getPasswordHash());

    if ($verifiedPassword) {
      return [true, [
        "id" => $user->getId(),
        "name" => $user->getName(),
        "email" => $user->getEmail(),
      ]];
    }

    return [false, "Senha incorreta."];
  }

  function findMovie($id)
  {
    foreach ($this->movies as $movie) {
      if ($movie->getId() === $id) {
        return [true, $movie];
      }
    }

    return [false, "Filme com id $id não encontrado."];
  }
}
