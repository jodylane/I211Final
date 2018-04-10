<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/10/2018
 * Time: 7:33 PM
 * Description: This file was created to
 */
class BookIndexView extends IndexView {
    public static function displayHeader ($title) {
        parent::displayHeader($title);
        // insert html for all book pages.
    }

    public static function displayFooter () {
        parent::displayFooter();
    }
}