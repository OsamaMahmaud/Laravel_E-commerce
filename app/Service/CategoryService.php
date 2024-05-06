<?php

namespace App\Service;


use App\Traits\ImageTrait;
use App\Repositories\CategoryRepository;

class CategoryService
{
    use ImageTrait;

    public $catRepository;

    public function __construct( CategoryRepository $CategoryRepository)
    {
         $this->catRepository=$CategoryRepository;
    }
    public function getMainCategory()
    {
        return $this->catRepository->getMainCategory();
        // Your method logic here
    }

    public function store( $request) {

        // dd($request);


       $request['parent_id']= $request['parent_id']?? 0; //if parent_id =null put parent_id =0
        // if($request['image']){

        //     $request['image']=$this->saveImage($request['image'],public_path('category'));
        // }

            // dd($request);


        return $this->catRepository->store($request);
    }


    public function getById($id,$childernCount=false)
    {
        return $this->catRepository->getById($id, $childernCount=false);
    }

     public function update( $id,$request)
     {
         //update without image
        //  dd($request);
        $request['parent_id']= $request['parent_id']?? 0;
         $cat= $this->getById($id);
         return  $cat->update($request);
     }
}
