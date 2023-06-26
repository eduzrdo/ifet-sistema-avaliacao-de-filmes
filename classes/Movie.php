<?php
class Movie
{
    private $id;
    private $title;
    private $imageUrl;
    private $averageScore;
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

    function getAverageScore()
    {
        return $this->averageScore;
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

        $sum = 0;

        foreach ($this->ratings as $rating) {
            $sum += $rating->getScore();
        }
        
        $averageScore = $sum / count($this->ratings);
        $this->averageScore = $averageScore;   
    }
}
