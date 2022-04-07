<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use App\Models\category;
class ProductController extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {
        $category = category::all();
        return view('admin.product.add',compact('category'));
    }


    public function insert(request $request)
    {
        $product = new Product();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/',$filename);
            $product->image = $filename;
        }
$product->cate_id= $request->input('cate_id');
$product->name = $request->input('name');
$product->slug = $request->input('slug');
$product->small_description = $request->input('small_description');
$product->description = $request->input('description');
$product->original_price = $request->input('original_price');
$product->selling_price = $request->input('selling_price');
$product->tax = $request->input('tax');
$product->qty = $request->input('qty');
$product->status = $request->input('status') == TRUE ? '1': '0';
$product->trending = $request->input('trending') == TRUE ? '1':'0';
$product->meta_title = $request->input('meta_title');
$product->meta_keywords = $request->input('meta_keywords');
$product->meta_description = $request->input('meta_description');
$product->save();
return redirect('products')->with('status',"Product Added Successfully");
    }



    public function edit($id)
    {
        $products = product::find($id);
        return view('admin.product.edit',compact('products'));
    }

    public function update(Request $request)
    {
        $products =product::find($request->id);

        if($request->hasFile('image'))
        {
                $path = 'assets/uploads/products/'.$products->image();
                if(file_exists($path))
                {
                    File::delete($path);
                }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '/' . $ext;
            $file->move('assets/uploads/products/',$filename);
            $products->image = $filename;
        }
$products->name = $request->input('name');
$products->slug = $request->input('slug');
$products->small_description = $request->input('small_description');
$products->description = $request->input('description');
$products->original_price = $request->input('original_price');
$products->selling_price = $request->input('selling_price');
$products->tax = $request->input('tax');
$products->qty = $request->input('qty');
$products->status = $request->input('status') == TRUE? '1': '0';
$products->trending = $request->input('trending')== TRUE ? '1':'0';
$products->meta_title = $request->input('meta_title');
$products->meta_keywords = $request->input('meta_keywords');
$products->meta_description = $request->input('meta_description');
$products->update();
return redirect('products')->with('status update succecfully');
    }
}
