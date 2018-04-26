<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/10/2018
 * Time: 7:33 PM
 * Description: This file was created to display search bar for books.
 */
class BookIndexView extends IndexView {
    public static function displayHeader($title) {
        parent::displayHeader($title);
        ?>
        <script> var media = 'book'; </script>
        <div class="row">
            <div class="searchBar">
                <div class="row">
                    <form class="col-md-5 col-md-offset-6" method="get" action="<?= BASE_URL ?>/book/search">
                        <div class="form-group col-md-10">
                            <input type="text" class="form-control" autocomplete="off" name="query-terms"
                                   placeholder="Search"
                                   onkeyup="handleKeyUp(event)">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
                <div class="row">
                    <div id="suggestionDiv" class="col-md-4 col-md-offset-6 list-group"></div>
                </div>
            </div>
        </div>

        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }
}
