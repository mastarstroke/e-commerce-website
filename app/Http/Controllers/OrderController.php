<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Contact;

class OrderController extends Controller
{
    public function newOrders()
    {
        $orders = Order::where('status', 0)->latest()->get();
        $messageCount = Contact::where('status', 'unread')->count();
        $messageViews = Contact::where('status', 'unread')->latest()->paginate(3);

        return view('admin.orders.index', compact('orders', 'messageCount','messageViews'));
    }

    // view a specific orders from admin end
    public function viewOrders($id)
    {
        $orders = Order::where('id', $id)->first();
        $messageCount = Contact::where('status', 'unread')->count();
        $messageViews = Contact::where('status', 'unread')->latest()->paginate(3);

        return view('admin.orders.view', compact('orders','messageCount','messageViews'));
    }

    public function updateOrder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('new-orders')->with('success', "Order Updated Successfully");
    }

    public function orderHistory()
    {
        $orders = Order::where('status', '1')->get();
        $messageCount = Contact::where('status', 'unread')->count();
        $messageViews = Contact::where('status', 'unread')->latest()->paginate(3);
        
        return view('admin.orders.history', compact('orders','messageCount','messageViews'));
    }
}
