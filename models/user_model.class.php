<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserModel {

    //private class properties
    static private $_instance = NULL;
    private $users_json;
    private $db, $dbConnection, $tblUsers, $tblUsersBooks;

    //constructor
    private function __construct() {

        //Not sure what this is for, was getting errors

        //$users_str = file_get_contents(dirname(__FILE__, 1) . "/users.json");
        //$this->users_json = json_decode($users_str, true);


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

        //not sure if necessary for user model?
        /*
        if (!isset($_SESSION['book_categories'])) {
            $categories = $this->getBookCategories();
            $_SESSION['book_categories'] = $categories;
        }
        */
    }

    //static method to ensure there is just one MovieModel instance
    public static function getUserModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    public function create_user(){
        if (!filter_has_var(INPUT_POST, 'firstName') ||
            !filter_has_var(INPUT_POST, 'lastName') ||
            !filter_has_var(INPUT_POST, 'role') ||
            !filter_has_var(INPUT_POST, 'email') ||
            !filter_has_var(INPUT_POST, 'password')) {

            return false;
            }

        $firstName = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING)));
        $lastName = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING)));
        $role = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING)));
        $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
        $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));

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

        return $this->dbConnection->query($sql);


        }

    //validate username and password
    public function validateUser($username, $password) {
        if ($username && $password && $this->users_json[$username] == $password) {
            return true;
        }
            return false;
    }
}