<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Cart;

class WishlistController extends Controller
{
    public function addToWishlist($id)
    {
        if(Auth::id())
        {
            $user_id= Auth::id();
            $prod_id=$id;

            $prod_check = Product::where('id', $prod_id)->first();

                if($prod_check)
                {
                
                    if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
                    {
                        return redirect()->with('status'  .$prod_check->name. " Already Added to Wishlist");
                    }
                    else{
                        $wishlist = new Wishlist;
                        $wishlist->user_id=$user_id;
                        $wishlist->prod_id=$prod_id;
            
                        $wishlist->save();
            
                        return redirect()->back()->with('status' .$prod_check->name. " Added to Wishlist");
                    }
                }
            }
            else
            {
                return redirect('/login')->with('status', "Login First");
            }
    }
    
    public function wishlistView()
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        $wishlistViews = Wishlist::where('user_id', Auth::id())
                ->join('products', 'wishlists.prod_id', '=', 'products.id')
                ->get();
        return view('wishlist', compact('cartCount', 'wishlistCount', 'wishlistViews'));
    }

    public function deleteWishlist($id)
    {
        Wishlist::where('prod_id', $id)->delete();
        return redirect()->back()->with('status', " Wishlist deleted");
    }
}
