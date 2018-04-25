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

        <div>This is the cart</div><br><br>



        <?php



        if(sizeof($cart) === 0){
            echo "Cart is empty";
        } else {
            foreach ($cart as $book) {
                $title = $book->getTitle();


                echo $title . "<br>";
            }
        }
       ?>


        <br><br>
        <a href="<?= BASE_URL ?>/book/clearCart"><div>Checkout</div></a>

        <?php

        parent::displayFooter();

    }
}