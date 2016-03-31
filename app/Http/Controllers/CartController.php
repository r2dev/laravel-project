<?php

namespace App\Http\Controllers;

use App\Repositories\CartRepository;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\DB;



class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $cart = Cart::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->first();
        if ($cart !== null) {
            if ($cart->is_done) {
                $cart = null;
            }
        }
        return view('cart.index', ['cart'=>$cart]);
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
        $cart = Cart::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')->firstOrCreate(['user_id' => $request->user()->id]);
        if (!$cart->products->contains($product->id)) {
            $cart->products()->attach($product->id, ['amount' => 1]);
        } else {
            $cart->products()->updateExistingPivot($product->id, ['amount' => DB::raw('amount + 1')]);
        }
        return back();
    }


}

