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

    // establish connection to database and retrieve book and book_categories tables and scrub all $_POST and $_GET values
    public function __construct() {
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
    }

    public static function getBookModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new BookModel();
        }
        return self::$_instance;
    }

    // list all books
    public function list_books() {
        $sql = "SELECT $this->tblBook.*, $this->tblBookCategory.category
          FROM $this->tblBook, $this->tblBookCategory
          WHERE $this->tblBook.category_id=$this->tblBookCategory.id";

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

        $books = array();

        // loop through all results and create a new book object and store it within books array for each result
        while ($obj = $query->fetch_object()) {
            $book = new Book(stripslashes($obj->title), stripcslashes($obj->author), stripslashes($obj->isbn), stripslashes($obj->category), stripslashes($obj->publish_date), stripslashes($obj->publisher), stripslashes($obj->image), stripslashes($obj->description));;
            //set the id for the book
            $book->setId($obj->id);

            //add the book into the array
            $books[] = $book;
        }
        // return books array
        return $books;
    }

    // return single book
    public function view_book($id) {
        $sql = "SELECT $this->tblBook.*, $this->tblBookCategory.category
          FROM $this->tblBook, $this->tblBookCategory
          WHERE $this->tblBook.category_id= $this->tblBookCategory.id
            AND $this->tblBook.id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // query successful and results greater than 0
        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a book object
            $book = new Book(stripslashes($obj->title), stripcslashes($obj->author), stripslashes($obj->isbn), stripslashes($obj->category), stripslashes($obj->publish_date), stripslashes($obj->publisher), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the book
            $book->setId($obj->id);

            return $book;
        }

        // else return false
        return false;
    }

    // update single book
    public function update_book($id) {
        // if these input fields were not retrieved return false
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

        // scrub input values
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        $isbn = trim(filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING));
        $author = trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING));
        $category = trim(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING));
        $publish_date = trim(filter_input(INPUT_POST, 'publish-date', FILTER_DEFAULT));
        $publisher = trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING));
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING));
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

        // update sql
        $sql = "UPDATE $this->tblBook
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

        // execute query returns true or false
        return $this->dbConnection->query($sql);
    }

    // delete single book
    public function destroy_book($id) {
        $sql = "DELETE
            FROM $this->tblBook
            WHERE id='$id'";

        // execute query returns true or false
        return $this->dbConnection->query($sql);
    }

    // create new book
    public function create_book() {
        // returns false if inputs are not found
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

        // scrub input values
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        $isbn = trim(filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING));
        $author = trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING));
        $category = trim(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING));
        $publish_date = trim(filter_input(INPUT_POST, 'publish-date', FILTER_DEFAULT));
        $publisher = trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING));
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING));
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

        // insert sql
        $sql = "INSERT
          INTO $this->tblBook(
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

        // execute query returns true or false
        return $this->dbConnection->query($sql);
    }

    // retrieve all book categories
    public function getBookCategories() {
        $sql = "SELECT * FROM " . $this->tblBookCategory;

        // execute query
        $query = $this->dbConnection->query($sql);

        // query false
        if (!$query) {
            return false;
        }

        // loop through an store category results in array and return array
        $categories = array();
        while ($obj = $query->fetch_object()) {
            $categories[$obj->category] = $obj->id;
        }
        return $categories;
    }

    // search results
    public function search_book($terms) {
        // split terms into array
        $terms = explode(" ", $terms);

        $sql = "SELECT
          $this->tblBook.*, $this->tblBookCategory.category
          FROM $this->tblBook, $this->tblBookCategory
          WHERE $this->tblBook.category_id=$this->tblBookCategory.id AND (1";

        // loop through terms and them to sql
        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }

        // complete sql
        $sql .= ")";

        // execute sql
        $query = $this->dbConnection->query($sql);

        // query failed
        if (!$query) {
            return false;
        }

        // no results
        if ($query->num_rows == 0) {
            return 0;
        }

        $books = array();

        // loop through each result and create new book object and store it books array for each result
        while ($obj = $query->fetch_object()) {
            $book = new Book($obj->title, $obj->author, $obj->isbn, $obj->category, $obj->publish_date, $obj->publisher, $obj->image, $obj->description);

            //set the id for the movie
            $book->setId($obj->id);

            //add the movie into the array
            $books[] = $book;
        }
        return $books;
    }
}