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

    private function setAverageScore($score)
    {
        $this->averageScore = $score;
    }

    function getRatings()
    {
        return $this->ratings;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function addRating($rating)
    {
        $this->ratings[] = $rating;

        $sum = 0;
        foreach ($this->ratings as $actualRating) {
            $sum += $actualRating->getScore();
        }

        $averageScore = $sum / count($this->ratings);

        $this->setAverageScore($averageScore);
    }
}
