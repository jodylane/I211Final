<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 1:23 PM
 * Description: This file was created to establish the connection to the database.
 */
class Database {
    private $params = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'indylibrary_db',
        'tblBook' => 'books',
        'tblBookCategory' => 'books_categories',
        'tblMovie' => 'movies',
        'tblMovieGenre' => 'movies_genre',
        'tblUser' => 'users',
        'tblUserBooks' => 'users_books'

    );

    private $objDBConnection = NULL;
    static private $_instance = NULL;

    public function __construct () {
        $this->objDBConnection = @new mysqli(
            $this->params['host'], $this->params['login'], $this->params['password'], $this->params['database']
        );
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            include 'error.php';
            exit();
        }
    }

    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    public function getConnection() {
        return $this->objDBConnection;
    }

    public function getBookTable() {
        return $this->params['tblBook'];
    }

    public function getBookCategoryTable() {
        return $this->params['tblBookCategory'];
    }

    public function getMovieTable() {
        return $this->params['tblMovie'];
    }

    public function getMovieGenreTable() {
        return $this->params['tblMovieGenre'];
    }

    public function getUserTable(){
        return $this->params['tblUser'];
    }

    public function getUserBooksTable(){
        return $this->params['tblUserBooks'];

    }
}