<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserController {

    private $user_model;

    //constructor
    public function __construct() {
        $this->user_model = UserModel::getUserModel();
    }

    //display login form
    public function login() {
        $view = new Login();
        $view->display();
    }

    //validate username and password
    public function validate() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        if ($this->user_model->validateUser($username, $password)) {
            $view = new Dashboard();
            $view->display($username);
        } else {
            $view = new Login();
            $view->display("Login failed");
        }
    }
    
    //logout
    public function logout() {
        $view = new Logout();
        $view->display();
    }


    //handle inaccessible methods
    public function __call($name, $arguments) {
        $message = "Calling method '$name' caused errors. Route does not exist.";

        echo ($message);
        return;
    }
}