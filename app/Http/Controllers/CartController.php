<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart($id)
    {
        if(Auth::id())
        {
            $user_id= Auth::id();
            $prod_id=$id;
            
            $prod_check = Product::where('id', $prod_id)->first();

            if($prod_check)
            {
                if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
                {
                    return redirect()->back()->with('status' .$prod_check->name.  "Already Added to cart");
                }
                else{
                    $cart=new Cart;
                    $cart->user_id=$user_id;
                    $cart->prod_id=$prod_id;

                    $cart->save();

                    return redirect()->back()->with('status',  ".$prod_check->name. Added to cart successfully!");
                }
            }
        }
            else
        {
            return redirect('/login')->back()->with('status',  "Please Login First");
        }
    }

    public function cartView()
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        $cartViews = Cart::where('user_id', Auth::id())
                ->join('products', 'carts.prod_id', '=', 'products.id')
                ->get();
        return view('cart', compact('cartCount', 'cartViews', 'wishlistCount'));
    }

    public function deleteCart($id)
    {
        Cart::where('prod_id', $id)->delete();
        return redirect()->back()->with('status','Item Deleted!');
    }
}
