<?php
/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 4/24/2018
 * Time: 1:54 PM
 */

class CartModel {
    private $session;
    static private $_instance = NULL;


    public static function getCartModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new BookModel();
        }
        return self::$_instance;
    }

    public function addToCart($id) {

    }

    public function getCart() {
        //if isset else
        $this->session['cart'] = [];
    }
}