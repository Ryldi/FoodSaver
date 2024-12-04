<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index($id){
        $category = Category::with('restaurants')->find($id);
        
        $restaurants = $category->restaurants()->paginate(6);
        return view('pages.categoryDetail', compact('category', 'restaurants'));
    }
}
