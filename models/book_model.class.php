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

    public function getBookModel () {
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
        $sql = "SELECT * FROM " . $this->tblBook . "," . $this->tblBookCategory .
            " WHERE " . $this->tblBook . ".category=" . $this->tblBookCategory . ".category_id" .
            " AND " . $this->tblBook . ".id='$id'";

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
}