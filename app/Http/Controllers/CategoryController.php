<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class CategoryController extends Controller
{
    // Constructing function for middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCategory()
    {
        $messageCount = Contact::where('status', 'unread')->count();
        $messageViews = Contact::where('status', 'unread')->latest()->paginate(3);

        return view('admin.category.add', compact('messageCount','messageViews'));
    }

    public function storeCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->back()->with('success', "Category Added Successfully");
    }

    public function index()
    {
        $categories = Category::all();
        $messageCount = Contact::where('status', 'unread')->count();
        $messageViews = Contact::where('status', 'unread')->latest()->paginate(3);

        return view('admin.category.index', compact('categories','messageCount','messageViews'));
    }

    public function editCategory($id)
    {
        $categories = Category::find($id);
        $messageCount = Contact::where('status', 'unread')->count();
        $messageViews = Contact::where('status', 'unread')->latest()->paginate(3);

        return view('admin.category.edit', compact('categories','messageCount','messageViews'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->update();

        return redirect()->back()->with('success', "Category Updated Successfully");
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('success','Category Deleted Successfully!');
    }




}
