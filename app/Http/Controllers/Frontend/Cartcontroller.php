<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\cart;
use Illuminate\Support\Facades\Session;


class Cartcontroller extends Controller
{
    public function addproduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qry = $request->input('product_qty');


        if(Auth::check())
        {
            $prod_check =Product::where('id', $product_id)->first();

            if($prod_check)
            {
                if(Cart::where('prod_id', $product_id)->where('user_id',Auth::id())->first())
                {
                    return response()->json(['status' => $prod_check->name, " Already Added to cart"]);
                }
                else
                {
                $cartItem = new cart();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $product_qry;
                $cartItem->save();
                return response()->json(['status' => $prod_check->name, "Added to cart"]);
                }
            }
        }
        else
        {
            $prod =Product::where('id', $product_id)->first();
            $cart = session()->get('cart', []);
            $cart[$product_id] = [
                "id" => $product_id,
                "qty" => $product_qry,
                "name" => $prod->name,
                "image" => $prod->image,
                "price" => $prod->price,
                "url" => $prod->url,

            ];

            session()->put('cart', $cart);
            return response()->json([
                    "messages" => "Added to cart on session",
                    "status" => 200,
            ]);
        }
    }

   public function viewcart()
    {
        $cartitems = cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartitems'));
    }

    public function updatecart(Request $request)
    {
        $prod_id = $request->post('prod_id_');

        if (Auth::check())
        {
            if(cart::where('id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cart = cart::where('id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = ($cart->prod_qty)+1;
                $cart->update();
                return response()->json(['status'=>"Quantity update"]);
            }

        }
        else
           {
                if(sizeof(Product::where('id',$prod_id)->where('stock', '>=', $request->qty)->get()))
                {
                    $cart = session()->get('cart');
                    $cart[$prod_id]["stock"] = $request->qty;
                    session()->put('cart', $cart);
                    session()->flash('success', 'Cart updated successfully');
                    return response()->json([
                        "messages" => "quantity Updated with session",
                        "status" => 200,
                    ]);
                }
                else
                {
                    $product = Product::where('status','y')->where('id',$request->pid)->first();
                        return response()->json([
                            "product" => $product,
                            "messages" => "Maximum reached",
                            "status" => 500
                        ]);
                }
           }
    }

    public function deleteproduct(request $request)
    {
        if (Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = (cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first());
                $cartItem->delete();
                return response()->json(['status' => "product deleted successfully"]);
            }
        }
              else
                {
        if($request->prod_id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->prod_id])) {
                unset($cart[$request->prod_id]);
                session()->put('cart', $cart);
            }
            return response()->json([
                "messages" => "product removed from cart with session",
                "status" => 200
            ]);
        }
    }
    }
}
