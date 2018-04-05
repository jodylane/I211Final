<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 1:46 PM
 * Description: This file was created to manage books.
 */
class BookController {
    private $book_model;

    public function construct () {
        $this->book_model = BookModel::getBookModel();
    }

    public function index () {

    }

    public function show ($id) {

    }

    public function edit ($id) {

    }

    public function create ($title, $author, $isbn, $publisher, $publish_date, $desc) {

    }

    public function destroy ($id) {

    }

    public function error ($message) {

    }
}