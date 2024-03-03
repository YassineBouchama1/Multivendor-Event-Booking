<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CategoriesController extends Controller
{
    public function index()
    {

        // Cache::forget('categories');
        // cacheing categories in redis
        $categories = Cache::remember('categories', 60, function () {

            return   Category::get();
        });

        return view('dashboard.categories.index', compact('categories'));
    }


    // Store a newly created Category in storage
    public function store(Request $request)
    {
        // dd($request->name);
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . Category::class],

        ]);

        //create category
        $menu = new Category();
        $menu->name = $request->name;
        $menu->save();


        // after create new category refrech cache
        Cache::forget('categories');


        return redirect()->route('categories.index')->with('success', 'category created successfully.');
    }




    // Remove the specified category from storage
    public function destroy(Category $category)
    {
        $category->delete();
        Cache::forget('categories');
        return redirect()->route('categories.index')->with('success', 'category deleted successfully.');
    }
}
