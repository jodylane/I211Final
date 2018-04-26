<?php
/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 4/24/2018
 * Time: 2:02 PM
 */


class CartIndex extends CartIndexView {

    public function display($cart){

        parent::displayHeader("Indianapolis Online Library");

        ?>

        <div>Checkout List</div><br><br>



        <?php

        if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
        echo "Your list is empty.<br><br>";
        include ('includes/footer.php');
        exit();
        } 
        
        else {
          foreach ($cart as $book) {
               $title = $book->getTitle();
               echo $title . "<br>";
        }}
               ?>
        
        <br><br>
        <a href="<?= BASE_URL ?>/book/clearCart"><div>Checkout</div></a>
                
        <?php

        parent::displayFooter();

    
        
}}