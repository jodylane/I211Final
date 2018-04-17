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

    //constructor
    private function __construct() {
        $users_str = file_get_contents(dirname(__FILE__, 1) . "/users.json");
        $this->users_json = json_decode($users_str, true);
    }

    //static method to ensure there is just one MovieModel instance
    public static function getUserModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    //validate username and password
    public function validateUser($username, $password) {
        if ($username && $password && $this->users_json[$username] == $password) {
            return true;
        }
            return false;
    }
}