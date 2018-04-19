<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/19/2018
 * Time: 12:25 AM
 * Description: This file was created to
 */
class UserError extends UserIndexView
{

    public function display($message) {
        parent::displayHeader("error");
        ?>
        <h3>An error has occurred.</h3>
                <p><?= "$message." ?></p>
        <a href="<?= BASE_URL ?>/book/index">Back to book list</a>

        <?php
        parent::displayFooter();
    }
}