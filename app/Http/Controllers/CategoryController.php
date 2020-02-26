<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryCreateRequest;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $categories = $category->orderBy('updated_at', 'DESC')->paginate(5);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request, Category $categories)
    {
        $message = 'Create a category successfully';
        $data = $request->only('name');
        $store = $categories->create($data);
        if ($store) {
            return redirect()->back()->with('success', $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryCreateRequest $request, Category $category)
    {
        $message = 'Updated a category successfull.';
        $data = $request->except(['_token', '_method']);
        $update = $category->update($data);

        if ($update) {
            return redirect()->back()->with('success', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $delete = 'Deleted successfull record at ' . $category->id;
        $destroy = $category->destroy($category->id);

        if ($destroy) {
            return redirect()->back()->with('success', $delete);
        }
    }

    public function categoryProducts(Category $category)
    {
        $data = $category->products()->orderBy('updated_at', 'DESC')->paginate(5);
        return view('category.category-products', compact(['data', 'category']));
    }
}
