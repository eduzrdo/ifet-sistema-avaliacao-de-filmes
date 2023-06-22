<?php
  class Rating {
    private $id;
    private $user;
    private $movie;
    private $score;
    private $comment;

    function __construct($user, $movie, $score, $comment)
    {
      $this->user = $user;
      $this->movie = $movie;
      $this->score = $score;
      $this->comment = $comment;

      $user->addRating($this);
      $movie->addRating($this);
    }

    function getId() {
      return $this->id;
    }
    
    function setId($id) {
      $this->id = $id;
    }
    
    function getUser() {
      return $this->user;
    }
    
    function getMovie() {
      return $this->movie;
    }
    
    function getScore() {
      return $this->score;
    }

    function getComment() {
      return $this->comment;
    }
  }
