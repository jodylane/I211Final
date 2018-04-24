<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/12/2018
 * Time: 12:40 PM
 * Description: This file was created to
 */
class WelcomeIndex extends IndexView {

    public function display() {
        parent::displayHeader("Indianapolis Library Home");
        ?>  
<div class='row'>
        <div class="col-md-8 col-md-offset-2 jumbotron">
    <h1 style="text-align: center">Indianapolis Online Library</h1>
    <p style="text-align: center">What would you like to do?</p>
    <br>
    <p style="text-align: center"><a class="btn btn-primary btn-lg" href="<?= BASE_URL ?>/user/login" role="button">Log In</a> Not registered? <a href="<?= BASE_URL ?>/user/signup">Create an Account </a></p>
        </div>
</div>


        <?php
        parent::displayFooter();
    }

}
