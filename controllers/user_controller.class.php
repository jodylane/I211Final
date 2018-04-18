<?php
/*
 * Name: {brad update these two fields}
 * Description: {brad update these two fields}
 *
 * */
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

    // the model should handle this not the controller
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
        // logout should reroute back to welcome controller no need for a logout view
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