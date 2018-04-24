<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserModel
{
    private $db, $dbConnection, $tblUsers, $tblUsersBooks;
    static private $_instance = NULL;

    //constructor
    private function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUsers = $this->db->getUserTable();
        $this->tblUsersBooks = $this->db->getUserBooksTable();

        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        if(!isset($_SESSION['user'])) {
            $_SESSION['user'] = '';
        }
    }

    //static method to ensure there is just one MovieModel instance
    public static function getUserModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    public function logout() {
        session_unset();
        setcookie(session_name(), '', time()-3600);
        session_destroy();
    }
    public function login_user() {
        if (!filter_has_var(INPUT_POST, 'email') ||
        !filter_has_var(INPUT_POST, 'password')){
            return false;
        }
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        $sql = "SELECT
          *
          FROM $this->tblUsers
          WHERE email='$email'
            AND password='$password'";

        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();


            //create a book object
            $user = new User(stripcslashes($obj->first_name), stripcslashes($obj->last_name), stripcslashes($obj->email), stripcslashes($obj->role));
            //set the id for the book
            $user->setId($obj->id);

            return $user;
        }
        return false;
    }

    public function create_user()
    {
        if (!filter_has_var(INPUT_POST, 'firstName') ||
            !filter_has_var(INPUT_POST, 'lastName') ||
            !filter_has_var(INPUT_POST, 'role') ||
            !filter_has_var(INPUT_POST, 'email') ||
            !filter_has_var(INPUT_POST, 'password')
        ) {

            return false;
        }

        $firstName = trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING));
        $lastName = trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING));
        $role = trim(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        $sql = "INSERT 
            INTO $this->tblUsers(
            id,
            role,
            first_name,
            last_name,
            email,
            password
            )
            VALUES(
            NULL,
            '$role',
            '$firstName',
            '$lastName',
            '$email',
            '$password'
            )";
        $id = $this->dbConnection->insert_id;

        $sql = "SELECT
          *
          FROM $this->tblUsers
          WHERE id='$id'";

        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a book object
            $user = new User(stripcslashes($obj->first_name), stripcslashes($obj->last_name), stripcslashes($obj->email), stripcslashes($obj->role));

            //set the id for the book
            $user->setId($obj->id);

            return $user;
        }
        return false;
    }


}