<?php
/**
 * User: Brad
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

    public function sign($last_name, $first_name, $birth_date, $email) {
        try {
            // validate input; if invalid, throw exceptions
            if (empty($first_name) || empty($last_name) || empty($birth_date) || empty($email)) {
                throw new DataMissingException("All fields are required.");
            } else if (!Utilities::validatedate($birth_date)) {
                throw new DateException("The birthdate you entered is not a valid date.");
            } else if (!Utilities::checkemail($email)) {
                throw new EmailException("The email you entered is invalid.");
            } else { //all inputs are valid; add them into the database.
                $guest = new Guest($first_name, $last_name, $birth_date, $email);
                $guest_model = new GuestModel;
                $guest_model->addGuest($guest);

                $view = new SignGuest();
                $view->display();
            }
        } catch (DataMissingException $e) {
            $this->error($e->getMessage());
        } catch (DateException $e) {
            $this->error($e->getMessage());
        } catch (EmailException $e) {
            $this->error($e->getMessage());
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
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