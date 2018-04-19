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

        if (!isset($_SESSION['book_categories'])) {
            $categories = $this->getBookCategories();
            $_SESSION['book_categories'] = $categories;
        }
    }

    public static function getBookModel() {
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

    public function view_book($id) {
        $sql = "SELECT $this->tblBook.*, $this->tblBookCategory.category
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

    public function update_book($id) {
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

        return $this->dbConnection->query($sql);
    }

    public function destroy_book($id) {
        $sql = "DELETE
            FROM $this->tblBook
            WHERE id='$id'";

        return $this->dbConnection->query($sql);
    }

    public function create_book() {
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

        return $this->dbConnection->query($sql);
    }

    public function getBookCategories() {
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



    public function search_book($terms) {
        $terms = explode(" ", $terms);

        $sql = "SELECT
          $this->tblBook.*, $this->tblBookCategory.category
          FROM $this->tblBook, $this->tblBookCategory
          WHERE $this->tblBook.category_id=$this->tblBookCategory.id AND (1";

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

        $books = array();

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