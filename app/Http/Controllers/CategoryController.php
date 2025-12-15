<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function create()
    {
        // $category = Category::orderBy('id', 'desc')->paginate(5);
        return view('admin.create-category');
    }

    public function store(CategoryStoreRequest $request)
    {
        // Validate and store the category
        // $validatedData = $request->validate([
        //     'category_name' => ['required', 'string', 'max:255'],
        //     'category_description' => ['nullable', 'string', 'min:15', 'max:500'],
        //     'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        // ]);

        $validatedData = $request->validated;

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('category_images', 'public');
            }

            // Using Eloquent ORM
            $category = new Category();
            $category->category_name = $validatedData['category_name'];
            $category->category_description = $validatedData['category_description'];
            $category->image = $imagePath;
            $category->save();
            return redirect()->route('admin.categories.create')->with('success', 'Category created successfully!');
        } catch (Exception $e) {
            Log::alert('Task creation failed', [
                'error_message' => $e->getMessage(),
            ]);
            return back()
                ->with('error', 'Something went wrong! try again.');
        }
    }

    public function show()
    {
        $categories = Category::latest()->paginate(5);
        return view('admin.view-categories', compact('categories'));
    }

    public function edit($id)
    {
        # Using Eloquent ORM
        $category = Category::findOrFail($id);
        return view('admin.edit-category', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        // Validate the incoming request
        // $validatedData = $request->validate([
        //     'category_name' => ['required', 'string', 'max:255'],
        //     'category_description' => ['nullable', 'string', 'min:15', 'max:1000'],
        //     'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        // ]);

        $category = Category::findOrFail($id);
        $validatedData = $request->validated;

        try {
            if ($request->hasFile('image')) {
                // Delete old image if needed
                if ($category->image && Storage::disk('public')->exists($category->image)) {
                    Storage::disk('public')->delete($category->image);
                }

                $category->image = $request->file('image')->store('category_images', 'public');
            }

            $category->category_name = $validatedData['category_name'];
            $category->category_description = $validatedData['category_description'] ?? $category->category_description;
            $category->save();

            return redirect()->route('admin.categories.view')->with('success', 'Category updated successfully!');
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
        $task = Category::findOrFail($id);

        $imagePath = $task->image;
        if ($imagePath) {
            // Delete the image file from storage
            Storage::disk('public')->delete($imagePath);
        }
        $task->delete();

        return redirect()->route('admin.categories.view')->with('success', 'Task deleted successfully.');
    }

    public function category()
    {
        $categories = Category::all();
        return view('pages.category', compact('categories'));
    }
}
