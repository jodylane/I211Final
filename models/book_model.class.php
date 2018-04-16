<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 1:48 PM
 * Description: This file was created to send and retrieve calls from and to the database for the books.
 */
class BookModel {
    private $db, $dbConnection, $tblBook, $tblBookCategory;
    static private $_instance = NULL;

    public function __construct () {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblBook = $this->db->getBookTable();
        $this->tblBookCategory = $this->db->getBookCategoryTable();

        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        if (!isset($_SESSION['book_categories'])) {
            $categories = $this->getBookCategories();
            $_SESSION['book_categories'] = $categories;
        }
    }

    public static function getBookModel () {
        if (self::$_instance == NULL) {
            self::$_instance = new BookModel();
        }
        return self::$_instance;
    }

    public function list_books() {
        $sql = "SELECT $this->tblBook.*, $this->tblBookCategory.category
          FROM $this->tblBook, $this->tblBookCategory
          WHERE $this->tblBook.category_id=$this->tblBookCategory.id";

        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        if ($query->num_rows == 0) {
            return 0;
        }

        $books = array();

        while ($obj = $query->fetch_object()) {
            $book = new Book(stripslashes($obj->title), stripcslashes($obj->author), stripslashes($obj->isbn), stripslashes($obj->category), stripslashes($obj->publish_date), stripslashes($obj->publisher), stripslashes($obj->image), stripslashes($obj->description));;
            //set the id for the book
            $book->setId($obj->id);

            //add the book into the array
            $books[] = $book;
        }
        return $books;
    }

    public function view_book ($id) {
        $sql = "SELECT *
          FROM $this->tblBook, $this->tblBookCategory
          WHERE $this->tblBook.category_id= $this->tblBookCategory.id
            AND $this->tblBook.id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a book object
            $book = new Book(stripslashes($obj->title), stripcslashes($obj->author), stripslashes($obj->isbn), stripslashes($obj->category), stripslashes($obj->publish_date), stripslashes($obj->publisher), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the book
            $book->setId($obj->id);

            return $book;
        }

        return false;
    }

    public function getBookCategories () {
        $sql = "SELECT * FROM " . $this->tblBookCategory;

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

    //search the database for movies that match words in titles.
    //Return an array of movies if succeed; false otherwise.

    public function search_book($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array

        $termsLength = sizeof($terms);

        //select statement for AND serach
        $sql = "SELECT * FROM " . $this->db->getBookTable() . " WHERE TITLE LIKE '%" . $terms[0] . "%'";

        if($termsLength > 1) {
            for($x = 1; $x < $termsLength; $x++) {
                $sql .= " AND TITLE LIKE '%" . $terms[$x] . "%'";
            }
        }

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no movie was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 movie found.
        //create an array to store all the returned movies
        $movies = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $movie = new Book($obj->title, $obj->author, $obj->isbn, $obj->category_id, $obj->publish_date, $obj->publisher, $obj->image, $obj->description);

            //set the id for the movie
            $movie->setId($obj->id);

            //add the movie into the array
            $movies[] = $movie;
        }
        return $movies;
    }
}