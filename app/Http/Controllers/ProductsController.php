<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        //$products = DB::table('products')->get(); //ORM
        $products = Product::all();
        $categories = ProductCategory::all();
        return view('products.index', compact('products','categories'));
    }
    
    public function show(Product $product){
        //$product = Product::find($id);

        return view('products.show', compact('product'));
    }

    public function store(Request $request){


        $this->validate($request,[
            'name' => 'required'
        ]);


        /*$product = new Product;

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->is_active = 1;*/

        Product::create( $request->all() );

        return back();

    }

    public function edit(Product $product){

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product){

        $product->update($request->all());

        return back();
    }

}
