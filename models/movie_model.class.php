<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 1:48 PM
 * Description: This file was created to send and retrieve calls from and to the database for the movies.
 */
class MovieModel {
    private $db, $dbConnection, $tblMovie, $tblMovieGenre;
    static private $_instance = NULL;

    // establish connection to database and retrieve movies and movie_genres tables and scrub all $_POST and $_GET values
    public function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblMovie = $this->db->getMovieTable();
        $this->tblMovieGenre = $this->db->getMovieGenreTable();

        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    // retrieve MovieModel instance
    public static function getMovieModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new MovieModel();
        }
        return self::$_instance;
    }

    // list all movies
    public function list_movies() {

        $sql = "SELECT $this->tblMovie.*, $this->tblMovieGenre.genre
          FROM $this->tblMovie, $this->tblMovieGenre
          WHERE $this->tblMovie.genre_id=$this->tblMovieGenre.genre_id";

        // execute query
        $query = $this->dbConnection->query($sql);

        // query failed
        if (!$query) {
            return false;
        }

        // no rows present?
        if ($query->num_rows == 0) {
            return 0;
        }

        $movies = array();

        // loop through each object and create a new movie object and store it in the movies array
        while ($obj = $query->fetch_object()) {
            $movie = new Movie(stripslashes($obj->title), stripcslashes($obj->director), stripslashes($obj->genre), stripslashes($obj->release_date), stripslashes($obj->writer), stripslashes($obj->image), stripslashes($obj->description));
            //set the id for the movie
            $movie->setId($obj->id);

            //add the movie into the array
            $movies[] = $movie;
        }
        // return movies array.
        return $movies;
    }

    // retrieve single movie
    public function view_movie($id) {
        $sql = "SELECT $this->tblMovie.*, $this->tblMovieGenre.genre
          FROM $this->tblMovie, $this->tblMovieGenre
          WHERE $this->tblMovie.genre_id= $this->tblMovieGenre.genre_id
            AND $this->tblMovie.id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // query successful and row greater than 0 fetch row and create new movie object and return it
        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();
            //create a movie object
            $movie = new Movie(stripslashes($obj->title), stripcslashes($obj->director), stripslashes($obj->genre), stripslashes($obj->release_date), stripslashes($obj->writer), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the movie
            $movie->setId($obj->id);

            return $movie;
        }
        // else return false there was an error.
        return false;
    }

    // update movie details
    public function update_movie($id) {
        // if these inputs were not filled out return false.
        if (!filter_has_var(INPUT_POST, 'title') ||
            !filter_has_var(INPUT_POST, 'director') ||
            !filter_has_var(INPUT_POST, 'genre') ||
            !filter_has_var(INPUT_POST, 'release-date') ||
            !filter_has_var(INPUT_POST, 'writer') ||
            !filter_has_var(INPUT_POST, 'image') ||
            !filter_has_var(INPUT_POST, 'description')) {

            return false;
        }

        // scrub input values
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        $director = trim(filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING));
        $genre = trim(filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING));
        $release_date = trim(filter_input(INPUT_POST, 'release-date', FILTER_DEFAULT));
        $writer = trim(filter_input(INPUT_POST, 'writer', FILTER_SANITIZE_STRING));
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING));
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

        // update sql
        $sql = "UPDATE $this->tblMovie
          SET
            title='$title',
            director='$director',
            genre_id='$genre',
            release_date='$release_date',
            writer='$writer',
            image='$image',
            description='$description'
          WHERE id='$id'";

        // returns true or false
        return $this->dbConnection->query($sql);
    }

    // delete single movie
    public function destroy_movie($id) {
        $sql = "DELETE
            FROM $this->tblMovie
            WHERE id='$id'";

        // returns true or false execute query
        return $this->dbConnection->query($sql);
    }

    // create a new movie
    public function create_movie() {
        // if any of these inputs were not filled out return false
        if (!filter_has_var(INPUT_POST, 'title') ||
            !filter_has_var(INPUT_POST, 'director') ||
            !filter_has_var(INPUT_POST, 'genre') ||
            !filter_has_var(INPUT_POST, 'release-date') ||
            !filter_has_var(INPUT_POST, 'writer') ||
            !filter_has_var(INPUT_POST, 'image') ||
            !filter_has_var(INPUT_POST, 'description')) {
            return false;
        }

        // scrub input values to avoid sql injection
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        $director = trim(filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING));
        $genre = trim(filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING));
        $release_date = trim(filter_input(INPUT_POST, 'release-date', FILTER_DEFAULT));
        $writer = trim(filter_input(INPUT_POST, 'writer', FILTER_SANITIZE_STRING));
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING));
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

        // insert query
        $sql = "INSERT
          INTO $this->tblMovie(
            id,
            title,
            director,
            genre_id,
            release_date,
            writer,
            image,
            description
          )
          VALUES(
            NULL,
            '$title',
            '$director',
            '$genre',
            '$release_date',
            '$writer',
            '$image',
            '$description'
          )";

        // return true or false execute query
        return $this->dbConnection->query($sql);
    }

    // retrieve all movie generes
    public function getMovieGenres() {
        $sql = "SELECT * FROM " . $this->tblMovieGenre;
        // execute query
        $query = $this->dbConnection->query($sql);

        // query unsuccessful
        if (!$query) {
            return false;
        }

        // loop through all genres and store results in array
        $genres = array();
        while ($obj = $query->fetch_object()) {
            $genres[$obj->genre] = $obj->genre_id;
        }
        return $genres;
    }
    // search results
    public function search_movie($terms) {
        // split terms into an array
        $terms = explode(" ", $terms);

        // search query
        $sql = "SELECT
          $this->tblMovie.*, $this->tblMovieGenre.genre
          FROM $this->tblMovie, $this->tblMovieGenre
          WHERE $this->tblMovie.genre_id=$this->tblMovieGenre.genre_id AND (1";

        // add onto query for each term found in array
        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }

        // complete sql
        $sql .= ")";

        // execute query
        $query = $this->dbConnection->query($sql);

        // query failed
        if (!$query) {
            return false;
        }

        // no results
        if ($query->num_rows == 0) {
            return 0;
        }

        $movies = array();

        // loop through all results and create a new movie object and store that object in the movies array for result.
        while ($obj = $query->fetch_object()) {
            $movie = new Movie($obj->title, $obj->director, $obj->genre, $obj->release_date, $obj->writer, $obj->image, $obj->description);

            //set the id for the movie
            $movie->setId($obj->id);

            //add the movie into the array
            $movies[] = $movie;
        }
        return $movies;
    }
}
