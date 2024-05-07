<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        return view('pages.admin.product.index', compact(
            'product',
            'category'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        try {
            $data = $request->all();

            $data['slug'] = Str::slug($request->name);
            $data['category_id'] = $request->category_id;
            $data['description'] = $request->description;
            $data['price'] = $request->price;

            Product::create($data);

            return redirect()->back()->with('success', 'Product has been created');
        } catch (Exception $error) {
            return redirect()->back()->with('error', 'Failed to create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $product = Product::find($id);

        try {
                $data = $request->all();
                $data['slug'] = Str::slug($request->name);
                $data['description'] = $request->description;
                $data['price'] = $request->price;

                $product->update($data);
            return redirect()->back()->with('success', 'Success to update Data');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // find category id
            $product = Product::find($id);

            $product->delete();

            return redirect()->back()->with('success', 'Product deleted');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Failed to delete the category');
        }
    }
}
