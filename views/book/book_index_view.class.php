<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/10/2018
 * Time: 7:33 PM
 * Description: This file was created to
 */
class BookIndexView extends IndexView {
    public static function displayHeader($title) {
        parent::displayHeader($title);
        // insert html for all book pages.
        ?>
        <div class="searchBar">
            <form class="navbar-form navbar-right" method="get" action="<?= BASE_URL ?>/book/search">
                <div class="form-group">
                    <input type="text" class="form-control" autocomplete="off" name="query-terms" placeholder="Search"
                           onkeyup="handleKeyUp(event)">

                    <div id="suggestionDiv"></div>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }
}