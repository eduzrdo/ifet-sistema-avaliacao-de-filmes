<?php
class Movie
{
    private $id;
    private $title;
    private $imageUrl;
    private $averageRating;
    private $ratings = [];

    function __construct($title, $imageUrl)
    {
        $this->title = $title;
        $this->imageUrl = $imageUrl;
    }

    function getId()
    {
        return $this->id;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getImageUrl()
    {
        return $this->imageUrl;
    }

    function getAverageRating()
    {
        return $this->averageRating;
    }

    function getRatings()
    {
        return $this->ratings;
    }
    function setId($id)
    {
        $this->id = $id;
    }
    function addRating($ratings)
    {
        $this->ratings[] = $ratings;
    }
    private function updateAverageRating()
    {
        //implementar a função - conversa em grupo para definir!
        return $this->id;
    }
}
