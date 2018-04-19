<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dashboard {

    public function display($name) {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Dashboard</title>
            </head>
            <body>
                <div>
                    <h3>User Login</h3>
                    <h3>Dashboard</h3>
                    <p>Welcome, <?= $name ?>!</p>
                    <form method='post' action='<?= BASE_URL ?>/user/logout'>
                        <div><input type='submit' value='Log out'></div>
                    </form>
                </div>
            </body>
        </html>
        <?php
    }
}