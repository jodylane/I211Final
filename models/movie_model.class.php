<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 1:48 PM
 * Description: This file was created to send and retrieve calls from and to the database for the movies.
 */
class MovieModel {
    private $db, $dbConnection, $tblMovie, $tblMovieCategory;
    static private $_instance = NULL;

    public function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblMovie = $this->db->getMovieTable();
        $this->tblMovieCategory = $this->db->getMovieCategoryTable();

        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        if (isset($_SESSION['movie_categories'])) {
            $categories = $this->getMovieCategories();
            $_SESSION['movie_categories'] = $categories;
        }
    }

    public static function getMovieModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new MovieModel();
        }
        return self::$_instance;
    }

    public function list_movies() {
        $sql = "SELECT $this->tblMovie.*, $this->tblMovieCategory.category
          FROM $this->tblMovie, $this->tblMovieCategory
          WHERE $this->tblMovie.category_id=$this->tblMovieCategory.id";

        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        if ($query->num_rows == 0) {
            return 0;
        }

        $movies = array();

        while ($obj = $query->fetch_object()) {
            $movie = new Movie(stripslashes($obj->title), stripcslashes($obj->author), stripslashes($obj->isbn), stripslashes($obj->category), stripslashes($obj->publish_date), stripslashes($obj->publisher), stripslashes($obj->image), stripslashes($obj->description));;
            //set the id for the movie
            $movie->setId($obj->id);

            //add the movie into the array
            $movies[] = $movie;
        }
        return $movies;
    }

    public function view_movie($id) {
        $sql = "SELECT $this->tblMovie.*, $this->tblMovieCategory.category
          FROM $this->tblMovie, $this->tblMovieCategory
          WHERE $this->tblMovie.category_id= $this->tblMovieCategory.id
            AND $this->tblMovie.id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a movie object
            $movie = new Movie(stripslashes($obj->title), stripcslashes($obj->author), stripslashes($obj->isbn), stripslashes($obj->category), stripslashes($obj->publish_date), stripslashes($obj->publisher), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the movie
            $movie->setId($obj->id);

            return $movie;
        }

        return false;
    }

    public function update_movie($id) {
        if (!filter_has_var(INPUT_POST, 'title') ||
            !filter_has_var(INPUT_POST, 'isbn') ||
            !filter_has_var(INPUT_POST, 'author') ||
            !filter_has_var(INPUT_POST, 'category') ||
            !filter_has_var(INPUT_POST, 'publish-date') ||
            !filter_has_var(INPUT_POST, 'publisher') ||
            !filter_has_var(INPUT_POST, 'image') ||
            !filter_has_var(INPUT_POST, 'description')) {

            return false;
        }

        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        $isbn = trim(filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING));
        $author = trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING));
        $category = trim(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING));
        $publish_date = trim(filter_input(INPUT_POST, 'publish-date', FILTER_DEFAULT));
        $publisher = trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING));
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING));
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

        $sql = "UPDATE $this->tblMovie
          SET
            title='$title',
            isbn='$isbn',
            author='$author',
            category_id='$category',
            publish_date='$publish_date',
            publisher='$publisher',
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
            !filter_has_var(INPUT_POST, 'isbn') ||
            !filter_has_var(INPUT_POST, 'author') ||
            !filter_has_var(INPUT_POST, 'category') ||
            !filter_has_var(INPUT_POST, 'publish-date') ||
            !filter_has_var(INPUT_POST, 'publisher') ||
            !filter_has_var(INPUT_POST, 'image') ||
            !filter_has_var(INPUT_POST, 'description')) {

            return false;
        }

        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        $isbn = trim(filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING));
        $author = trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING));
        $category = trim(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING));
        $publish_date = trim(filter_input(INPUT_POST, 'publish-date', FILTER_DEFAULT));
        $publisher = trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING));
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING));
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

        $sql = "INSERT
          INTO $this->tblMovie(
            id,
            title,
            isbn,
            author,
            category_id,
            publish_date,
            publisher,
            image,
            description
          )
          VALUES(
            NULL,
            '$title',
            '$isbn',
            '$author',
            '$category',
            '$publish_date',
            '$publisher',
            '$image',
            '$description'
          )";

        return $this->dbConnection->query($sql);
    }

    public function getMovieCategories() {
        $sql = "SELECT * FROM " . $this->tblMovieCategory;

        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        $categories = array();
        while ($obj = $query->fetch_object()) {
            $categories[$obj->category] = $obj->id;
        }
        return $categories;
    }



    public function search_movie($terms) {
        $terms = explode(" ", $terms);

        $sql = "SELECT
          $this->tblMovie.*, $this->tblMovieCategory.category
          FROM $this->tblMovie, $this->tblMovieCategory
          WHERE $this->tblMovie.category_id=$this->tblMovieCategory.id AND (1";

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
            $movie = new Movie($obj->title, $obj->author, $obj->isbn, $obj->category, $obj->publish_date, $obj->publisher, $obj->image, $obj->description);

            //set the id for the movie
            $movie->setId($obj->id);

            //add the movie into the array
            $movies[] = $movie;
        }
        return $movies;
    }
}