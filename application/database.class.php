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

    //Grab database from phpmyadimin
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }
    //gain connection to database
    public function getConnection() {
        return $this->objDBConnection;
    }
    //get book table from database
    public function getBookTable() {
        return $this->params['tblBook'];
    }
    //get book category from database
    public function getBookCategoryTable() {
        return $this->params['tblBookCategory'];
    }
    //get movie table from database
    public function getMovieTable() {
        return $this->params['tblMovie'];
    }
    //get movie genre from database
    public function getMovieGenreTable() {
        return $this->params['tblMovieGenre'];
    }
    //get user table from database
    public function getUserTable(){
        return $this->params['tblUser'];
    }
    // get books table from database
    public function getUserBooksTable(){
        return $this->params['tblUserBooks'];

    }
}