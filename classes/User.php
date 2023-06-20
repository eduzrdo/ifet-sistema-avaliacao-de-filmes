<?php 
  class User {
    private $id;
    private $name;
    private $email;
    private $hash;
    private $ratings = [];

    function __construct($name, $email, $password)
    {
      $this->name = $name;
      $this->email = $email;
      $this->hash = $password;
    }
  }
