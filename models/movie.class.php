<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 1:46 PM
 * Description: This file was created to blue print how a books structure should look.
 */
class Movie {
    private $id, $title, $director, $genre, $release_date, $writer, $image, $description;

    public function __construct ($title, $director, $genre, $release_date, $writer, $image, $description) {
        $this->title = $title;
        $this->director = $director;
        $this->genre = $genre;
        $this->release_date = $release_date;
        $this->writer = $writer;
        $this->image = $image;
        $this->description = $description;
    }

    public function getId () {
        return $this->id;
    }

    public function getTitle () {
        return $this->title;
    }

    public function getDirector () {
        return $this->director;
    }

    public function getGenre () {
        return $this->genre;
    }

    public function getReleaseDate () {
        return $this->release_date;
    }

    public function getWriter () {
        return $this->writer;
    }

    public function getImage () {
        return $this->image;
    }

    public function getDescription () {
        return $this->description;
    }

    public function setId ($id) {
        $this->id = $id;
    }
}