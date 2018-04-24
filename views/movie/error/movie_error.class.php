<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:04 PM
 * Description: This file was created to
 */
class MovieError extends MovieIndexView {
    public function display($message) {
        parent::displayHeader('Movies Error');
        ?>
        <h3>An error has occurred.</h3>
        <p><?= "$message." ?></p>
        <a href="<?= BASE_URL ?>/movie/">Back to movie list</a>
        <?php
        parent::displayFooter();
    }
}