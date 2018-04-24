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

        if (isset($_SESSION['movie_genres'])) {
            $genres = $this->getMovieGenres();
            $_SESSION['movie_genres'] = $genres;
        }
    }

    public static function getMovieModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new MovieModel();
        }
        return self::$_instance;
    }

    public function list_movies() {
        $sql = "SELECT $this->tblMovie.*, $this->tblMovieGenre.genre
          FROM $this->tblMovie, $this->tblMovieGenre
          WHERE $this->tblMovie.genre_id=$this->tblMovieGenre.id";

        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        if ($query->num_rows == 0) {
            return 0;
        }

        $movies = array();

        while ($obj = $query->fetch_object()) {
            $movie = new Movie(stripslashes($obj->title), stripcslashes($obj->director), stripslashes($obj->genre), stripslashes($obj->release_date), stripslashes($obj->writer), stripslashes($obj->image), stripslashes($obj->description));
            //set the id for the movie
            $movie->setId($obj->id);

            //add the movie into the array
            $movies[] = $movie;
        }
        return $movies;
    }

    public function view_movie($id) {
        $sql = "SELECT $this->tblMovie.*, $this->tblMovieGenre.genre
          FROM $this->tblMovie, $this->tblMovieGenre
          WHERE $this->tblMovie.genre_id= $this->tblMovieGenre.id
            AND $this->tblMovie.id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();
            //create a movie object
            $movie = new Movie(stripslashes($obj->title), stripcslashes($obj->director), stripslashes($obj->genre), stripslashes($obj->release_date), stripslashes($obj->writer), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the movie
            $movie->setId($obj->id);

            return $movie;
        }

        return false;
    }

    public function update_movie($id) {
        if (!filter_has_var(INPUT_POST, 'title') ||
            !filter_has_var(INPUT_POST, 'director') ||
            !filter_has_var(INPUT_POST, 'genre') ||
            !filter_has_var(INPUT_POST, 'release-date') ||
            !filter_has_var(INPUT_POST, 'writer') ||
            !filter_has_var(INPUT_POST, 'image') ||
            !filter_has_var(INPUT_POST, 'description')) {

            return false;
        }

        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        $director = trim(filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING));
        $genre = trim(filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING));
        $release_date = trim(filter_input(INPUT_POST, 'release-date', FILTER_DEFAULT));
        $writer = trim(filter_input(INPUT_POST, 'writer', FILTER_SANITIZE_STRING));
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING));
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

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

        return $this->dbConnection->query($sql);
    }

    public function destroy_movie($id) {
        $sql = "DELETE
            FROM $this->tblMovie
            WHERE id='$id'";

        return $this->dbConnection->query($sql);
    }

    public function create_movie() {
        if (!filter_has_var(INPUT_POST, 'title') ||
            !filter_has_var(INPUT_POST, 'director') ||
            !filter_has_var(INPUT_POST, 'genre') ||
            !filter_has_var(INPUT_POST, 'release-date') ||
            !filter_has_var(INPUT_POST, 'writer') ||
            !filter_has_var(INPUT_POST, 'image') ||
            !filter_has_var(INPUT_POST, 'description')) {
            return false;
        }

        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        $director = trim(filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING));
        $genre = trim(filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING));
        $release_date = trim(filter_input(INPUT_POST, 'release-date', FILTER_DEFAULT));
        $writer = trim(filter_input(INPUT_POST, 'writer', FILTER_SANITIZE_STRING));
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING));
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

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

        return $this->dbConnection->query($sql);
    }

    public function getMovieGenres() {
        $sql = "SELECT * FROM " . $this->tblMovieGenre;

        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        $genres = array();
        while ($obj = $query->fetch_object()) {
            $genres[$obj->genre] = $obj->id;
        }
        return $genres;
    }



    public function search_movie($terms) {
        $terms = explode(" ", $terms);

        $sql = "SELECT
          $this->tblMovie.*, $this->tblMovieGenre.genre
          FROM $this->tblMovie, $this->tblMovieGenre
          WHERE $this->tblMovie.genre_id=$this->tblMovieGenre.id AND (1";

        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        if ($query->num_rows == 0) {
            return 0;
        }

        $movies = array();

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