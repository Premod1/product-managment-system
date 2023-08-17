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
        $products = Product::orderBy('display_order_no', 'asc')->get();
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
            'image' => 'required|image|max:2048', // Max size of 2MB
        ]);

        // Check image size before proceeding
        $image = $request->file('image');
        $imageSize = $image->getSize(); // Size in bytes
        if ($imageSize > 2 * 1024 * 1024) { // Convert 2MB to bytes
            return redirect()->back()->withErrors(['image' => 'Image size should be less than 2MB']);
        }

        // Create a new Product instance
        $product = new Product();
        $product->code = $validatedData['product_code'];
        $product->name = $validatedData['product_name'];
        $product->description = $validatedData['product_description'];
        $product->category_id = $validatedData['product_category'];
        $product->display_order_no = $validatedData['display_order_no'];
        $product->price_created_by = $validatedData['product_price'];

        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('uploads/products', $filename);
        $product->image = $filename;

        $product->save();

        // Shift display order numbers of products that come after the newly added product
        Product::where('display_order_no', '>=', $validatedData['display_order_no'])
            ->where('id', '<>', $product->id)
            ->increment('display_order_no');

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

        $oldDisplayOrder = $product->display_order_no;
        $newDisplayOrder = $request->input('display_order_no');

        // Shift other products' display order numbers if needed
        if ($oldDisplayOrder !== $newDisplayOrder) {
            if ($newDisplayOrder > $oldDisplayOrder) {
                Product::where('display_order_no', '>', $oldDisplayOrder)
                    ->where('display_order_no', '<=', $newDisplayOrder)
                    ->decrement('display_order_no');
            } else {
                Product::where('display_order_no', '<', $oldDisplayOrder)
                    ->where('display_order_no', '>=', $newDisplayOrder)
                    ->increment('display_order_no');
            }
        }

        // Update the product details
        $product->code = $request->input('product_code');
        $product->name = $request->input('product_name');
        $product->description = $request->input('product_description');
        $product->category_id = $request->input('product_category');
        $product->display_order_no = $newDisplayOrder;
        $product->price_created_by = $request->input('product_price');

        if ($request->hasFile('image')) {
            $destination = 'uploads/products/' . $product->image;
            if (File::exists($destination)) {
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
        $product = Product::findOrFail($id);

        $displayOrderToDelete = $product->display_order_no;

        $product->delete();

        // Shift display order numbers of products that come after the deleted product
        Product::where('display_order_no', '>', $displayOrderToDelete)
            ->decrement('display_order_no');

        return redirect()->route('product')->with('status', 'Product deleted successfully');
    }

}
