<?php

namespace App\Http\Controllers\Dashbord;

use App\Models\products;
use App\Models\categories;

use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Service\CategoryService;
use App\Service\ProductsService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\Product\ProductUpdate;
use App\Http\Requests\Dashbord\Product\ProductStoreRequest;


class ProductsController extends Controller
{
    use ImageTrait;

    public $categoryService;

    public $proService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProductsService $pro,CategoryService $category) {

        $this->categoryService = $category ;
        $this->proService      = $pro;

 }


    public function index()
    {
        // dd()
         $products =products::with('Category')->get();
        $maincategory= $this->categoryService-> getMainCategory();
        $categories=categories::all();
      return view('Dashboard.Products.index',compact('categories','products','maincategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        // return $request->all();

        // $file_name=$this->saveImage($request->image,'images/products');

        // // return $request;

        // //  products::create([$request->validated()+['image'=>$file_name]]);

        //  products::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'image'=>$file_name,
        //     'price' => $request->price,
        //      'discount_price'=>$request->discount_price,
        //      'category_id'=> $request->category_id,

        //  ]);
        $this->proService->store($request->validated());




         return REDIRECT()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $product= products::where('id',$id)->findOrFail($id);
         $categories=categories::all();
         $mainproduct= $this->categoryService-> getMainCategory();

        return   view("Dashboard.Products.edit",compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdate $request,$id)
    {
        //
        $this->proService->update($id,$request->validated());
        return REDIRECT()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

         $product=products::find($request->id);
         $product->delete();

         return redirect()->back();
    }
}
