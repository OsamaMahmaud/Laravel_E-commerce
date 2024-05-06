<?php

namespace App\Http\Controllers\Site;
use App\Models\categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = categories::all();

        return view("Site.Categories.index",compact('categories'));
    }
    public function create()
    {
        
        // return view("");
    }
}


