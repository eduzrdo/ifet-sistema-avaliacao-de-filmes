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

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function getAverageScore()
    {
        return $this->averageScore;
    }

    public function getRatings()
    {
        return $this->ratings;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function addRating($ratings)
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
