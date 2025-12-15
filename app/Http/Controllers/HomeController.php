<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function home()
    {
        $category = Category::first();
        $categories = Category::all();
        $post = Post::first();
        $posts = Post::all();
        return view('home', compact('category', 'categories', 'post', 'posts'));
    }

    public function filterByCategory($id)
{
    $posts = Post::where('category_id', $id)
                 ->with('category')
                 ->latest()
                 ->get();

    $categories = Category::all();
    $activeCategory = Category::findOrFail($id);

    return view('home', compact('posts', 'categories', 'activeCategory'));
}

}
