<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;

class Frontendcontroller extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(10)->get();
        $featured_category = Category::where('popular', '1')->take(10)->get();
        if(Auth::check())
        {
            $cart = collect(session('cart'));
           if(!$cart->isEmpty())
            {
                $id = $cart->pluck('id');
                $stock = $cart->pluck('qty');
                foreach ($id as $key=>$ids)
                {
                    foreach($stock as $keys=>$stocks)
                    {
                        $saverecord[$ids] = [
                            'user_id' => Auth::user()->id,
                            'prod_id' => $id[$key],
                            'prod_qty' => $stock[$key],
                        ];
                    }
                }

                foreach ($saverecord as $key => $id)
                {
                    cart::updateOrInsert($id);
                }
            }
        }
        return view('frontend.index', compact('featured_products','featured_category'));
    }

    public function category()
    {
        $category = category::where('status', '1')->get();
        return view('Frontend.category', compact('category'));
    }

    public function viewcategory($slug)

    {
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $products = product::where('cate_id',$category->id)->where('status','0')->get();
            return view('Frontend.products.index', compact('products','category'));
        }
        else{
            return redirect('/')->with('status',"slug is not available");
        }

    }

    public function productview($cate_slug,$prod_slug)
    {
        if(category::where('slug',$cate_slug)->exists())
        {
            if(product::where('slug',$prod_slug)->exists())
            {
                $products = product::where('slug',$prod_slug)->first();
                return view('Frontend.products.view', compact('products'));
            }
            else{
                return redirect('/')->with('status',"link is not available");
            }
        }
        else{
            return redirect('/')->with('status',"No such category available");
        }
    }
}
