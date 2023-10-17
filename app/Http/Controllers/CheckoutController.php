<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::id()){
            $image=$request->image;
            $cartCount = Cart::where('user_id', Auth::id())->count();
            $wishlistCount = Wishlist::where('user_id', Auth::id())->count();

            $old_cartItems = Cart::where('user_id', Auth::id())->get();
            foreach($old_cartItems as $item)
            {
                if(!Product::where('id', $item->prod_id)->exists())
                {
                    $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                    $removeItem->delete();
                }
            }
            $cartViews = Cart::where('user_id', Auth::id())
            ->join('products', 'carts.prod_id', '=', 'products.id')
            ->get();

            return view('checkout', compact('cartViews','cartCount','image','wishlistCount'));
        }
        else{
            return redirect('/login');
        }
           
    }

    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->country = $request->input('country');
        $order->city = $request->input('city');
        $order->address = $request->input('address');
        $order->state = $request->input('state');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->message = $request->input('message');

        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('receipt', $imagename);
        $order->image=$imagename;

        $order->total_price = $request->input('total_price');

        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())
        ->join('products', 'carts.prod_id', '=', 'products.id')
        ->get();
        foreach($cartitems as $item)
        {
            OrderItems::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'price'=>$item->selling_price,
            ]);
            
            $prod = Product::where('id', $item->prod_id)->first();
            $prod-> qty = $prod->qty - 1;
            $prod-> update();
        }

        if(Auth::user()->lname==NULL)
        {
            $user = User::where('id', Auth::id())->first();

            $user->lname = $request->input('lname');
            $user->country = $request->input('country');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->phone = $request->input('phone');
            $user->update();
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();

        Cart::destroy($cartitems);

        return redirect('/')->with('status', "Order Placed Successfully");
    }
}
