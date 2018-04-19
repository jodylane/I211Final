<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Logout {

    public function display() {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Logout</title>
            </head>
            <body>
                <div>
                     <h3>User Logout</h3>
                    <h3>Dashboard</h3>
                    <div>Logout successful. To login again, click <a href='<?= BASE_URL ?>/user/login'>here</a>.</div>
                </div>
            </body>
        </html>
        <?php
    }

}