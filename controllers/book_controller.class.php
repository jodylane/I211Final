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
    public static $instanceCount = 0;

    public function __construct () {
        $this->book_model = BookModel::getBookModel();
        self::$instanceCount++;
    }

    public function index() {
        $books = $this->book_model->list_books();
        echo self::$instanceCount;

        if(!$books) {
            $message = "There was a problem displaying books.";
            $this->error($message);
            return;
        }

        $view = new BookIndex();
        $view->display($books);
    }

    public function show($id) {
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
        $view = new BookShow();
        $view->display($book);
    }

    public function create () {

    }

    public function destroy ($id) {

    }

    public function suggest($terms) {
        $query_terms = urldecode(trim($terms));
        $books = $this->book_model->search_book($query_terms);

        $titles = array();
        if ($books) {
            foreach ($books as $book) {
                $titles[] = $book->getTitle();
            }
        }

        echo json_encode($titles);
    }

    public function search() {
        $query_terms = trim($_GET['query-terms']);

        if ($query_terms == "") {
            $this->index();
        }

        $books = $this->book_model->search_book($query_terms);

        if ($books === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched movies
        $search = new BookSearch();
        $search->display($query_terms, $books);
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