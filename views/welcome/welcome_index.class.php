<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/12/2018
 * Time: 12:40 PM
 * Description: This file was created to
 */
class WelcomeIndex extends IndexView {
    public function display() {
        parent::displayHeader("Home");
        echo "<h2>Welcome Home</h2>";
        parent::displayFooter();
    }

}