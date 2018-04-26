<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/18/2018
 * Time: 5:21 PM
 * Description: This file was created to blueprint a user object.
 */
class User {
    private $id, $f_name, $l_name, $email, $role;

    public function __construct ($f_name, $l_name, $email, $role) {
        $this->f_name = $f_name;
        $this->l_name = $l_name;
        $this->email = $email;
        $this->role = $role;
    }

    // getter functions to retrieve user attributes
    public function getFirstName() {
        return $this->f_name;
    }

    public function getLastName() {
        return $this->l_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }

    // set user id
    public function setId($id) {
        $this->id = $id;
    }

    // user methods to retrieve full name e.g. Josh lane or Lane, Josh
    public function fullName() {
        return $this->getFirstName() . " " . $this->getLastName();
    }


    public function fullNameLast() {
        return $this->getLastName() . ", " . $this->getFirstName();
    }
}
