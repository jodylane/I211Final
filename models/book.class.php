<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 1:46 PM
 * Description: This file was created to blue print how a books structure should look.
 */
class Book {
    private $id, $title, $author, $isbn, $category, $publish_date, $publisher, $image, $description;

    public function __construct ($title, $author, $isbn, $category, $publish_date, $publisher, $image, $description) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->category = $category;
        $this->publish_date = $publish_date;
        $this->publisher = $publisher;
        $this->image = $image;
        $this->description = $description;
    }

    public function getId () {
        return $this->id;
    }

    public function getTitle () {
        return $this->title;
    }

    public function getAuthor () {
        return $this->author;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getCategory () {
        return $this->category;
    }

    public function getPublishDate () {
        return $this->publish_date;
    }

    public function getPublisher () {
        return $this->publisher;
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