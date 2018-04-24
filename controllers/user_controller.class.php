<?php
/*
 * Name: {brad update these two fields}
 * Description: {brad update these two fields}
 *
 *
 *
 * */
class UserController {
    private $user_model;

    //constructor
    public function __construct() {
        $this->user_model = UserModel::getUserModel();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['user'])) {
            $_SESSION['user'] = false;
        }
        if(!isset($_SESSION['admin'])) {
            $_SESSION['admin'] = false;
        }
    }

    public function signup(){
        $view = new UserSignup();
        $view->display();
    }

    public function create(){
        $created = $this->user_model->create_user();
        if(!$created) {
            $message = "something went wrong and your user could not be registered.";
            $this->error($message);
            return;
        }
        $_SESSION['user'] = $created;
        $_SESSION['admin'] = $created->getRole() == 'admin';
        header('Location: ' . BASE_URL . '/book/');
        exit();
    }

    public function signin()
    {
        $login = $this->user_model->login_user();
        if (!$login) {
            $message = "There was an issue trying to login.";
            $this->error($message);
            return;
        }

        $_SESSION['user'] = $login;
        $_SESSION['admin'] = $login->getRole() == 'admin';
        header('Location: ' . BASE_URL . '/book/');
        exit();
    }

    //display login form
    public function login() {
        $view = new UserLogin();
        $view->display();
    }

    //logout
    public function logout() {
        $this->user_model->logout();
        $view = new UserLogout();
        $view->display();
    }

    public function error($message) {
        $view = new UserError();
        $view->display($message);
    }
    //handle inaccessible methods
    public function __call($name, $arguments) {
        $message = "Calling method '$name' caused errors. Route does not exist.";

        echo ($message);
        return;
    }
}