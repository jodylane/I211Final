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
        $book = $this->book_model->view_book($id);

        if(!$book) {
            $message = "There was a problem displaying the book id='" . $id . "'.";
            $this->error($message);
            return;
        }
        $view = new BookEdit();
        $view->display($book);
    }

    public function update ($id){
        $update = $this->book_model->update_book($id);
        if (!$update) {
            $message = "There was a problem updating the book id='" . $id . "'.";
            $this->error($message);
            return;
        }
        $book = $this->book_model->view_book($id);
        $view = new BookDetail();
        $view->display($book);
    }

    public function create () {

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