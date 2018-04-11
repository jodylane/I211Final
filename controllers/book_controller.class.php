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

    public function __construct () {
        $this->book_model = BookModel::getBookModel();
    }

    public function index () {
        $books = $this->book_model->list_books();

        if(!$books) {
            echo "hello";
            $message = "There was a problem displaying books.";
            $this->error($message);
            return;
        }

        $view = new BookIndex();
        $view->display($books);
    }

    public function show ($id) {
        $book = $this->book_model->view_book($id);
        if(!$book) {
            $message = "There was a problem displaying book with id=$id.";
            $this->error($message);
            return;
        }

        $view = new BookShow();
        $view->display($book);
    }

    public function edit ($id) {

    }

    public function create ($title, $author, $isbn, $category, $publisher, $publish_date, $image, $desc) {

    }

    public function destroy ($id) {

    }

    public function error ($message) {
        $error = new BookError();
        $error->display($message);
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }
}