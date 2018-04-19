<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserLogin extends UserIndexView
{

    public function display($message = "")
    {
        parent::displayHeader("Login");
        ?>
        <div>
        <h3>User Login</h3>

        <p>Please login:</p>

        <p><?= $message ?></p>

        <form method='post' action='<?= BASE_URL ?>/user/validate'>
            <table>
                <tr>
                    <td>User name:</td>
                    <td><input type='text' name='username'></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type='password' name='password'></td>
                </tr>
                <tr>
                    <td><input type='submit' value='Log in'></td>
                </tr>
            </table>
        </form>
        <?php
        parent::displayFooter();
    }

}