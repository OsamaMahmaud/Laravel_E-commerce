<?php

namespace App\Http\Controllers\Dashbord;
use App\Models\categories;
use App\Utils\ImageUpload;
use Illuminate\Http\Request;
use App\Service\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\Category\CategoryStore;
// use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{

    private $categoryService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //create constractor  to make category service
     public function __construct(CategoryService  $category) {

            $this->categoryService = $category ;

     }


    public function index()
    {
          $categorys =Categories::all();
          $mainCategories= $this ->categoryService ->getMainCategory();

         return view('Dashboard.Categories.index',compact('categorys','mainCategories'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {

        // return $request;
        $categorys =Categories::paginate(10);
        $mainCategories= $this ->categoryService ->getMainCategory();
        // dd($request->image);
        // Categories::create([
        //     'name'=>$request->name,
        //     'parent_id'=>$request->parent_id ,
        // ]);
        $this->categoryService->store($request->validated());
        return view('Dashboard.Categories.index',compact('categorys','mainCategories'))->with('success');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories,$id)
    {
        //
        // $category= $this->categoryService->edit($categories);

        $category= $this->categoryService->getById($id,true);
        $mainCategories= $this->categoryService->getMainCategory();

        // Categories::where('id',$id)->findOrFail($id);
        return  view("dashboard.Categories.edit",compact('category','mainCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStore $request,$id)
    {
        //
        $this->categoryService->update($id,$request->validated());
        return redirect()->route('Categories.edit',$id);
    }


    public function destroy(Request $request )
    {
        //
        $categorys =Categories::all();
        $mainCategories= $this ->categoryService ->getMainCategory();

         $category_id=Categories::find($request->id)->delete();

        return redirect()->back();

    }
}
