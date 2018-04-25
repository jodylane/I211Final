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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['user'])) {
            $_SESSION['user'] = false;
        }
        if(!isset($_SESSION['admin'])) {
            $_SESSION['admin'] = false;
        }
        if (!isset($_SESSION['book_categories'])) {
            $categories = $this->book_model->getBookCategories();
            $_SESSION['book_categories'] = $categories;
        }
    }

    public function index() {
        $books = $this->book_model->list_books();
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

    public function edit($id) {
        $book = $this->book_model->view_book($id);
        if(!$book) {
            $message = "There was a problem displaying the book id='" . $id . "'.";
            $this->error($message);
            return;
        }
        $view = new BookEdit();
        $view->display($book);
    }

    public function update($id){
        $update = $this->book_model->update_book($id);
        if (!$update) {
            $message = "There was a problem updating the book id='" . $id . "'.";
            $this->error($message);
            return;
        }
        $book = $this->book_model->view_book($id);
        $confirm = "Book was successfully updated!";
        $view = new BookShow();
        $view->display($book, $confirm);
    }

    public function add() {
        $view = new BookAdd();
        $view->display();
    }

    public function create() {
        $created = $this->book_model->create_book();
        if (!$created) {
            $message = "There was a problem creating a new book.";
            $this->error($message);
            return;
        }
        $books = $this->book_model->list_books();
        $confirm = "Book was successfully added to library!";
        $view = new BookIndex();
        $view->display($books, $confirm);
    }

    public function destroy($id) {
        $destroy = $this->book_model->destroy_book($id);
        if(!$destroy) {
            $message = "There was a problem destroying the book id=$id.";
            $this->error($message);
            return;
        }
        $books = $this->book_model->list_books();
        $confirm = "Book was successfully deleted from library!";
        $view = new BookIndex();
        $view->display($books, $confirm);
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
            return;
        }
        $books = $this->book_model->search_book($query_terms);
        if ($books === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        $search = new BookSearch();
        $search->display($query_terms, $books);
    }

    public function error($message) {
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