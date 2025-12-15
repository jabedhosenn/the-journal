<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\UserModel;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $posts = Post::latest()->paginate(3);

        $categoryCount = Category::count();
        $postCount = Post::count();
        $userCount = UserModel::count();
        return view('dashboard', compact('posts', 'categoryCount', 'postCount', 'userCount'));
    }
}
