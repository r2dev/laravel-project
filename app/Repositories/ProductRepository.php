<?php

namespace App\Repositories;

use App\Cart;
use App\Product;


class ProductRepository
{
    public function forAll()
    {
        return Product::all();
    }

    public function forCart(Cart $cart)
    {
        return $cart->products();
    }


}