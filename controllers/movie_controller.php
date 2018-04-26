<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 1:46 PM
 * Description: This file was created to manage movies.
 */


class MovieController {
    private $movie_model;

    // retrieve moviemodel instace an set session variables if not already set
    public function __construct () {
        $this->movie_model = MovieModel::getMovieModel();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['user'])) {
            $_SESSION['user'] = false;
        }
        if(!isset($_SESSION['admin'])) {
            $_SESSION['admin'] = false;
        }
        if (!isset($_SESSION['movie_genres'])) {
            $genres = $this->movie_model->getMovieGenres();
            $_SESSION['movie_genres'] = $genres;
        }
    }

    // display all movies page
    public function index() {
        // retrieve all movies
        $movies = $this->movie_model->list_movies();

        // something went wrong set message and display it
        if(!$movies) {
            $message = "There was a problem displaying movies.";
            $this->error($message);
            return;
        }
        // else display list movies page
        $view = new MovieIndex();
        $view->display($movies);
    }

    // show movie details
    public function show($id) {
        // retrieve all movie
        $movie = $this->movie_model->view_movie($id);

        // something went wrong set message and display it
        if(!$movie) {
            $message = "There was a problem displaying movie with id=$id.";
            $this->error($message);
            return;
        }

        // else display movie details page page
        $view = new MovieShow();
        $view->display($movie);
    }

    // edit movie details
    public function edit($id) {
        // retrieve movie details
        $movie = $this->movie_model->view_movie($id);
        // something went wrong display error with message
        if(!$movie) {
            $message = "There was a problem displaying the movie id='" . $id . "'.";
            $this->error($message);
            return;
        }

        // else display edit movie details page
        $view = new MovieEdit();
        $view->display($movie);
    }

    public function update($id) {
        // update movie details
        $update = $this->movie_model->update_movie($id);

        // something went wrong display error with message
        if (!$update) {
            $message = "There was a problem updating the movie id='" . $id . "'.";
            $this->error($message);
            return;
        }

        // retrieve movie
        $movie = $this->movie_model->view_movie($id);
        // confirmation message
        $confirm = "Movie was successfully updated!";

        // display movie details page
        $view = new MovieShow();
        $view->display($movie, $confirm);
    }

    // display create movie page
    public function add() {
        $view = new MovieAdd();
        $view->display();
    }

    // create new movie
    public function create() {
        $created = $this->movie_model->create_movie();
        if (!$created) {
            $message = "There was a problem creating a new movie.";
            $this->error($message);
            return;
        }
        $movies = $this->movie_model->list_movies();
        $confirm = "Movie was successfully added to library!";
        $view = new MovieIndex();
        $view->display($movies, $confirm);
    }

    // destroy movie
    public function destroy($id) {
        $destroy = $this->movie_model->destroy_movie($id);
        if(!$destroy) {
            $message = "There was a problem destroying the movie id=$id.";
            $this->error($message);
            return;
        }
        $movies = $this->movie_model->list_movies();
        $confirm = "Movie was successfully deleted from library!";
        $view = new MovieIndex();
        $view->display($movies, $confirm);
    }

    public function suggest($terms) {
        $query_terms = urldecode(trim($terms));
        $movies = $this->movie_model->search_movie($query_terms);
        $titles = array();
        if ($movies) {
            foreach ($movies as $movie) {
                $titles[] = $movie->getTitle();
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
        $movies = $this->movie_model->search_movie($query_terms);
        if ($movies === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        $search = new MovieSearch();
        $search->display($query_terms, $movies);
    }

    public function error($message) {
        $error = new MovieError();
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