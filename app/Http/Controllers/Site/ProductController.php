<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;

class ProductController extends Controller
{
    //

    public function index($cat_id=null){
    {

        if($cat_id==null)
        {
        $products = products::all();
        return view("Site.Products.index", compact("products"));
        }
        else
        {
            $products = Products::where("category_id",$cat_id)->get();
            return view("Site.Products.index", compact("products"));
        }
    }
}
}
