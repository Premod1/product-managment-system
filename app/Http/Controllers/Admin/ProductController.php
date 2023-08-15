<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', ['category' => $category]);
    }
    public function store(Request $request)
    {
        // Validate the incoming data
    $validatedData = $request->validate([
        'product_code' => 'required',
        'product_name' => 'required',
        'product_description' => 'required',
        'product_category' => 'required',
        'display_order_no' => 'required|numeric',
        'product_price' => 'required|numeric',
        'image' => 'required|image',
    ]);

         // Create a new Product instance
         $product = new Product();
         $product->code = $validatedData['product_code'];
         $product->name = $validatedData['product_name'];
         $product->description = $validatedData['product_description'];
         $product->category_id = $validatedData['product_category'];
         $product->display_order_no = $validatedData['display_order_no'];
         $product->price_created_by = $validatedData['product_price'];

         $image = $request->file('image');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $image->move('uploads/products', $filename);
         $product->image = $filename;

         $product->save();

         return redirect()->route('product')->with('status', 'Product added successfully');

    }
    public function edit($id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('category', 'product'));

    }
    public function update(Request $request, $id)
    {
      $product = Product::findOrFail($id);
      $product->code = $request->input('product_code');
      $product->name = $request->input('product_name');
      $product->description = $request->input('product_description');
      $product->category_id = $request->input('product_category');
      $product->display_order_no = $request->input('display_order_no');
      $product->price_created_by = $request->input('product_price');

      if($request->hasFile('image'))
      {
        $destination = 'uploads/products/'.$product->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('uploads/products', $filename);
        $product->image = $filename;
      }
      $product->save();
      return redirect()->route('product')->with('status', 'Product updated successfully');
    }
    public function delete($id)
    {
        Product::findOrfail($id)->delete();
        return redirect()->route('product')->with('status', 'Product deleted successfully');
    }
}
