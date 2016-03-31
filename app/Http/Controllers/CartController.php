<?php

namespace App\Http\Controllers;

use App\Repositories\CartRepository;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Cart;



class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return Cart::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->get();
    }

    /**
     * @param Request $request
     * @param Product $product
     * add product to the cart
     * create a new cart if there is no cart
     * create a new cart if the last cart is finished (paid or discarded)
     * add to the cart if last cart is not finished
     */
    public function add_product(Request $request, Product $product)
    {
        $cart = new Cart;
        if (Cart::where('user_id', $request->user()->id)->count() === 0)
        {
            $cart->user_id = $request->user()->id;
            $cart->save();
        }
        $cart->products()->save($product);

    }


}
