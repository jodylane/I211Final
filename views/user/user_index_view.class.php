<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/18/2018
 * Time: 11:48 PM
 * Description: This file was created incase we want to add something between the navigation and content area across all user pages.
 */
class UserIndexView extends IndexView {
    public static function displayHeader($title) {
        parent::displayHeader($title);
    }

    public static function displayFooter() {
        parent::displayFooter();
    }
}
