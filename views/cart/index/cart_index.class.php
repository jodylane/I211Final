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
        
        //else {
          //  foreach ($cart as $book) {
            //    $title = $book->getTitle()
            //    echo $title . "<br>";
            
       //proceed if cart is l=]not empty
       $cart = $_SESSION['cart'];
       ?>
        
        <table>
        <tr>
        <th>Title</th>
        </tr>
    
        <?php 
        $sql = "SELECT ID, item_description, quantity, FROM movie OR books WHERE 0";

        foreach (array_keys($cart) as $id) {
        $sql .= " OR ID=$id";
    }
    
        //execute query
        $query = $conn->query($sql);

        //fetch books or movies and display them in a table
        while ($row = $query->fetch_assoc()) {
        $id = $row['ID'];
        $description = $row['description'];
        $qty = $cart[$id];
        echo "<tr>",
            "<td><a href='index.php?ID=$id'>$description</a></td>",
            "<td>$qty</td>",
            "</tr>";
    }
    ?>
</table>
        
        <div>
        <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
        <input type="button" value="Cancel" onclick="window.location.href = 'index.php'" />
        </div>
        
        
        <br><br>
        <a href="<?= BASE_URL ?>/book/clearCart"><div>Checkout</div></a>
                
        <?php

        parent::displayFooter();

    }
}