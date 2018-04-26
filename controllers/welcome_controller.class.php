<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/12/2018
 * Time: 12:35 PM
 * Description: This file was created to display welcome page.
 */
class WelcomeController {
    // root url display welcome page
    public function index () {
        $view = new WelcomeIndex();
        $view->display();
    }
}