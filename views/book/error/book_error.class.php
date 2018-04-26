<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:04 PM
 * Description: This file was created to display all book errors.
 */
class BookError extends BookIndexView {
    public function display($message) {
        parent::displayHeader('Book Error');
        ?>

        <h3>An error has occurred.</h3>
        <p><?= "$message." ?></p>
        <a href="<?= BASE_URL ?>/book/index">Back to book list</a>

        <?php
        parent::displayFooter();
    }
}
