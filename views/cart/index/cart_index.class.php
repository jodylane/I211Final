<?php
/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 4/24/2018
 * Time: 2:02 PM
 */


class CartIndex extends CartIndexView {

    public function display($cart){

        parent::displayHeader("Hey");

        ?>

        <div>This is the cart</div>


        <?php

        parent::displayFooter();

    }
}