<?php

namespace App\Http\Controllers;

use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    
    protected $products;
    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }

    //
    public function index()
    {
        $products = $this->products->forAll();
        return view('welcome', ['products' => $products]);
    }

    public function detail(Product $product)
    {
        return view('home');
    }
    
}
