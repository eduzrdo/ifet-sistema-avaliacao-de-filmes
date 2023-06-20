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
      $this->users = $system->users;
      $this->movies = $system->movies;
      $this->ratings = $system->ratings;
    }
  }

  //Antes de destruir serializa o sistema no servidor
  function __destruct()
  {
    $serializado = serialize($this);
    file_put_contents(PATH . 'database.save', $serializado);
  }
}
