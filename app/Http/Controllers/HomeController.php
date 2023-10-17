<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::latest()->paginate(8);
        $trendings = Product::where('trending', 'YES')->latest()->paginate(3);
        $bestSells = Product::where('bestsell', 'YES')->latest()->paginate(3);
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        return view('home', compact('products', 'categories', 'trendings', 'bestSells','cartCount','wishlistCount'));
    }

    public function shopView(Request $request)
    {
        $categories = Category::all();
        $products = Product::latest()->paginate(8);
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();

        return view('shop', compact('products', 'categories','cartCount','wishlistCount'));
    }

    public function redirect()
    {
        $messageCount = Contact::where('status', 'unread')->count();
        $messageViews = Contact::where('status', 'unread')->latest()->paginate(3);
        $ordersCount = Order::where('status', 0)->count();
        $ordersComplete = Order::where('status', 1)->count();
        $users = User::where('role', 'user')->count();
        $products = Product::all()->count();

        $charts = Order::where('status', 1)->select('id', 'created_at')
        ->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        // variables defined for the sales chart in the dashboard
        $months=[];
        $monthCount=[];
        foreach($charts as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);
        }
     
        if(Auth::id()) {
            $role = Auth::user()->role;
            if($role=="admin")
            {
                return view('admin.index', compact('messageCount','messageViews','ordersCount',
                                                    'ordersComplete','users','products','charts'
                                                    ,'months', 'monthCount'));
            }
            else
            {       
                $categories = Category::all();
                $products = Product::latest()->paginate(8);
                $trendings = Product::where('trending', 'YES')->latest()->paginate(3);
                $bestSells = Product::where('bestsell', 'YES')->latest()->paginate(3);
                $cartCount = Cart::where('user_id', Auth::id())->count();
                $wishlistCount = Wishlist::where('user_id', Auth::id())->count();  
                return view('home', compact('products', 'categories', 'trendings', 'bestSells','cartCount','wishlistCount'));
            }
        }
        else
        {
            return redirect('/login');
        }
    }

    public function usersView()
    {
        $users = User::latest()->get();
        $messageCount = Contact::where('status', 'unread')->count();
        $messageViews = Contact::where('status', 'unread')->latest()->paginate(3);
        return view('admin.users.index', compact('users','messageCount','messageViews'));
    }

    public function myOrders()
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();

        $orders = Order::where('user_id', Auth::id())->where('status', 0)->latest()->get();
        return view('orders.myorders', compact('orders','cartCount','wishlistCount'));
    }

    public function viewOrder($id)
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();

        $orders = Order::where('user_id', Auth::id())->where('id', $id)->first();
        return view('orders.view', compact('orders','cartCount','wishlistCount'));
    }

    public function orderHistories()
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();

        $orders = Order::where('status', '1')->get();
        return view('orders.history', compact('orders','cartCount','wishlistCount'));
    }

    public function contactUs()
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();

        return view('contact', compact('cartCount','wishlistCount'));
    }

    public function contactsUs(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $contact = new Contact();
        
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('status', "Message Sent Successfully!");
    }

    public function messageUs()
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        $messageCount = Contact::where('status', 'unread')->count();
        $messageViews = Contact::where('status', 'unread')->latest()->paginate(3);

        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('contacts','cartCount','wishlistCount','messageCount','messageViews'));
    }

    public function messageUpdate(Request $request, $id)
    {
        $contact = Contact::find($id);
        
        $contact->status = "read";
        $contact->save();

        return redirect()->back()->with('success', "Message Updated");
    }

}
