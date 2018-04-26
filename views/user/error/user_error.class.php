<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/19/2018
 * Time: 12:25 AM
 * Description: This file was created to display errors with login signup or logout methods.
 */
class UserError extends UserIndexView {
    public function display($message) {
        parent::displayHeader("User Error");
        ?>

        <h3>An error has occurred.</h3>
        <p><?= "$message." ?></p>
        <a href="<?= BASE_URL ?>/book/">Back to book list</a>

        <?php
        parent::displayFooter();
    }
}
