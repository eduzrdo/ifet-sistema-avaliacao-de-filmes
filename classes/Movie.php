<?php
class Movie
{
    private $id;
    private $title;
    private $posterPath;
    private $backdropPath;
    private $averageScore;
    private $ratings = [];

    function __construct($id, $title, $posterPath, $backdropPath)
    {
        $this->id = $id;
        $this->title = $title;
        $this->posterPath = $posterPath;
        $this->backdropPath = $backdropPath;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    function getPosterPath()
    {
        return $this->posterPath;
    }

    function getBackdropPath()
    {
        return $this->backdropPath;
    }

    public function getAverageScore()
    {
        return $this->averageScore;
    }

    public function getRatings()
    {
        return $this->ratings;
    }

    public function addRating($rating)
    {
        $this->ratings[] = $rating;

        $sum = 0;

        foreach ($this->ratings as $rating) {
            $sum += $rating->getScore();
        }

        $averageScore = $sum / count($this->ratings);
        $this->averageScore = $averageScore;
    }
}
