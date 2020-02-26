<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductCreateRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('updated_at', 'DESC')->paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $success = 'Add a record successfully';
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'category_id' => $request->cateID,
        ];

        $store = Product::create($data);

        if ($store) {
            // return redirect()->action('ProductController@index', 'success');
            return redirect()->back()->with('success', $success);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::get(['id', 'name']);
        return view('products.edit', compact(['product', 'category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCreateRequest $request, Product $product)
    {
        $eSuccess = "Update a record successfully";
        $data = $request->only('name', 'description', 'quantity', 'cateID');

        $update = $product->update($data);

        if($update) {
            return redirect()->back()->with('eSuccess', $eSuccess);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $message = "Remove successfully at record " . $product->id;
        $destroy = $product->destroy($product->id);

        if ($destroy) {
            return redirect()->back()->with('message', $message);
        }
    }
}
