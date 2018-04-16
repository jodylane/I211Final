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

    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $movies = $this->book_model->search_book($query_terms);

        //retrieve all movie titles and store them in an array
        $titles = array();
        if ($movies) {
            foreach ($movies as $movie) {
                $titles[] = $movie->getTitle();
            }
        }

        echo json_encode($titles);
    }

    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all movies
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching movies
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