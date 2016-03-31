<?php

namespace App\Http\Controllers;

use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    protected $products;
    public function __construct(ProductRepository $products)
    {
        $this->middleware('auth');
        $this->authorize('modify', Product::class);
        $this->products = $products;

    }

    public function index()
    {
        $products = $this->products->forAll();
        return view('admin.index', ['products' => $products]);
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->save();
        return redirect('/admin');
    }
}
