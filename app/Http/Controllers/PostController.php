<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\UserModel;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $users = UserModel::all();
        return view('admin.create-post', compact('categories', 'users'));
    }

    public function store(PostStoreRequest $request)
    {
        // $validateData = $request->validate([
        //     'title' => ['required', 'string', 'max:255'],
        //     'content' => ['nullable', 'string', 'min:50', 'max:500'],
        //     'category_id' => ['required', 'integer', 'exists:categories,id'],
        //     'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        //     'author' => ['required', 'string'],
        //     'read_time' => ['required', 'string', 'max:55'],
        //     'published_at' => ['nullable', 'date'],
        //     'is_featured' => ['nullable', 'boolean'],
        // ]);

        $validateData = $request->validated;
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('post_images', 'public');
            }

            // Using Eloquent ORM
            $post = new Post();
            $post->title = $validateData['title'];
            $post->content = $validateData['content'];
            $post->category_id = $validateData['category_id'];
            $post->image = $imagePath;
            $post->author = $validateData['author'];
            $post->read_time = $validateData['read_time'];
            $post->published_at = $validateData['published_at'];
            $post->is_featured = $request->boolean('is_featured');
            $post->save();
            return redirect()->route('admin.posts.create')->with('success', 'Post created successfully');
        } catch (Exception $e) {
            Log::alert('Task update failed', [
                'error_message' => $e->getMessage(),
            ]);
            return back()
                ->with('error', 'Something went wrong! try again.');
        }
    }

    public function show()
    {
        $posts = Post::latest()->paginate(5);
        return view('admin.view-posts', compact('posts'));
    }

    public function edit($id)
    {
        # Using Eloquent ORM
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $users = UserModel::all();

        return view('admin.edit-post', compact('post', 'categories', 'users'));
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        // $validateData = $request->validate([
        //     'title' => ['required', 'string', 'max:255'],
        //     'content' => ['nullable', 'string', 'min:50', 'max:500'],
        //     'category_id' => ['required', 'integer', 'exists:categories,id'],
        //     'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        //     'author' => ['required', 'string'],
        //     'read_time' => ['required', 'string', 'max:55'],
        //     'published_at' => ['nullable', 'date'],
        //     'is_featured' => ['nullable', 'boolean'],
        // ]);

        $validateData = $request->validated;

        try {
            // UPDATE TEXT FIELDS
            $post->title = $validateData['title'];
            $post->content = $validateData['content'];
            $post->category_id = $validateData['category_id'];
            $post->author = $validateData['author'];
            $post->read_time = $validateData['read_time'];
            $post->published_at = $validateData['published_at'];

            if ($request->hasFile('image')) {
                if ($post->image && Storage::disk('public')->exists($post->image)) {
                    Storage::disk('public')->delete($post->image);
                }

                $post->image = $request->file('image')->store('post_images', 'public');
            }
            $post->save();
            return redirect()->route('admin.posts.view')->with('success', 'Post updated successfully');
        } catch (Exception $e) {
            Log::alert('Task update failed', [
                'error_message' => $e->getMessage(),
            ]);
            return back()
                ->with('error', 'Something went wrong! try again.');
        }
    }

    public function destroy($id)
    {
        // Using Eloquent ORM
        $post = Post::findOrFail($id);

        $imagePath = $post->image;
        if ($imagePath) {
            // Delete the image file from storage
            Storage::disk('public')->delete($imagePath);
        }
        $post->delete();

        return redirect()->route('admin.posts.view')->with('success', 'Post deleted successfully.');
    }

    public function post()
    {
        $posts = Post::all();
        return view('pages.post', compact('posts'));
    }

    // public function articlePost(Request $request, $id)
    // {
    //     $post = Post::findOrFail($id);
    //     $posts = Post::all();
    //     return view('pages.article-post', compact('post', 'posts'));
    // }
    public function singlePost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $posts = Post::all();
        return view('pages.single-post', compact('post', 'posts'));
    }
}
