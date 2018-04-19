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
        <div id="main-header">Welcome to the Indianapolis Library.</div>

        <div id="thumbnails">
            <p>What would you like to do?</p>
            
            <a href="<?= BASE_URL ?>/index">
                <img src="<?= BASE_URL ?>/www/img/no_cover.gif" title="Library" />
            </a>
            <a href="<?= BASE_URL ?>/views/login">
                <img src="<?= BASE_URL ?>/www/img/no_cover.gif" title="Login"/>
            </a>
            <a href="<?= BASE_URL ?>/view/signup">
                <img src="<?= BASE_URL ?>/www/img/no_cover.gif" title="Sign Up"/>
            </a>
        </div>

        <?php
        parent::displayFooter();
    }

}
