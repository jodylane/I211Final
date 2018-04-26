<?php

/*
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/18/2018
 * Time: 5:50 PM
 * Description: This file was created to display a log out message to notify the user upon logging out.
 */

class UserLogout extends UserIndexView {
    public function display() {
        parent::displayHeader("logout");
        ?>

        <h3>User Logout</h3>
        <h3>Dashboard</h3>
        <div>Logout successful. To login again, click <a href='<?= BASE_URL ?>/user/login'>here</a>.</div>

        <?php
        parent::displayFooter();
    }
}
