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
        if (isset($_SESSION['movie_genres'])) {
            $genres = $this->movie_model->getMovieGenres();
            $_SESSION['movie_genres'] = $genres;
        }
    }

    public function index() {
        $movies = $this->movie_model->list_movies();
        if(!$movies) {
            $message = "There was a problem displaying movies.";
            $this->error($message);
            return;
        }
        $view = new MovieIndex();
        $view->display($movies);
    }

    public function show($id) {
        $movie = $this->movie_model->view_movie($id);
        if(!$movie) {
            $message = "There was a problem displaying movie with id=$id.";
            $this->error($message);
            return;
        }
        $view = new MovieShow();
        $view->display($movie);
    }

    public function edit($id) {
        $movie = $this->movie_model->view_movie($id);
        if(!$movie) {
            $message = "There was a problem displaying the movie id='" . $id . "'.";
            $this->error($message);
            return;
        }
        $view = new MovieEdit();
        $view->display($movie);
    }

    public function update($id){
        $update = $this->movie_model->update_movie($id);
        if (!$update) {
            $message = "There was a problem updating the movie id='" . $id . "'.";
            $this->error($message);
            return;
        }
        $movie = $this->movie_model->view_movie($id);
        $confirm = "Movie was successfully updated!";
        $view = new MovieShow();
        $view->display($movie, $confirm);
    }

    public function add() {
        $view = new MovieAdd();
        $view->display();
    }

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