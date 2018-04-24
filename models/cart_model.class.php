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

    public function __construct($session) {
      $this->session = $session;
    }

    public function addToCart($id) {

    }

    public function getCart() {
        //if isset else
        $this->session['cart'] = [];
    }
}