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
        $this->dbConnection = $this->getConnection();
        $this->tblBook = $this->getBookTable();
        $this->tblBookCategory = $this->getBookCategoryTable();

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

    public function getBookModel () {
        if (self::$_instance == NULL) {
            self::$_instance = new BookModel();
        }
        return self::$_instance;
    }

    public function list_books() {
        $sql = "SELECT * FROM " . $this->tblBook . "," . $this->tblBookCategory .
            " WHERE " . $this->tblBook . ".category=" . $this->tblBookCategory . ".category_id";

        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        if ($query->num_rows == 0) {
            return 0;
        }

        $books = array();

        while ($obj = $query->fetch_object()) {
            $book = new Book(stripslashes($obj->title), stripcslashes($obj->author), stripslashes($obj->isbn), stripslashes($obj->category), stripslashes($obj->publish_date), stripslashes($obj->publisher), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the book
            $book->setId($obj->id);

            //add the book into the array
            $books[] = $book;
        }
        return $books;
    }

    public function view_book ($id) {

    }

    public function getBookCategories () {

    }
}