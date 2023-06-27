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
  private $mostRatedMovies = [];

  function __construct()
  {
    //Se já existe um sistema serializado carrega ele para o objeto criado
    if (file_exists(PATH . 'database.save')) {
      $data = file_get_contents(PATH . 'database.save');
      $system = unserialize($data);

      //Copia os dados para os atributos
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

    return [false, "Esse filme ainda não possui avaliações. Seja o primeiro! 😁"];
  }

  function searchMovie($search)
  {
    $curl = curl_init();
    $search = urlencode($search);

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?query=$search&include_adult=false&language=pt-BR&page=1",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => [
        "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYTQ4ZmY3YWE5NmRlYjRlYThmY2YzNTAyZjU0NTU0NiIsInN1YiI6IjYxZDNhNWUwYTIyZDNlMDA2N2IyYzExMiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.aSJXpzlW6gZKBuYMOjCl3Ziy_6WbYz0WiMrSW31xKtQ",
        "accept: application/json"
      ],
    ]);

    $response = curl_exec($curl);
    $data = json_decode($response);

    curl_close($curl);

    if (isset($data->success) && $data->success === false) {
      return [false, "Não foi possível realizar a busca. Tente novamente mais tarde."];
    } else {
      return [true, $data];
    }
  }
}
