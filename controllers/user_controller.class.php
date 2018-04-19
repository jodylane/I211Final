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
        header('Location: ' . BASE_URL . '/book/index');
    }

    public function signin()
    {
        $login = $this->user_model->login_user();

        echo $_SESSION['user']->fullName();
        if (!$login) {
            $message = "There was an issue trying to login.";
            $this->error($message);
            return;
        }

        header('Location: ' . BASE_URL . '/book/index');
    }

    //display login form
    public function login() {
        $view = new UserLogin();
        $view->display();
    }

    //logout
    public function logout() {
        // logout should reroute back to welcome controller no need for a logout view
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