<?php

namespace App\Repositories;

use App\Models\products;
use App\Traits\ImageTrait;
use App\Repositories\RepositoryInterface;

class ProductsRepository implements RepositoryInterface
{
    use ImageTrait;
    public $ProductRepository;
    public function __construct(products $product)
    {
        $this->ProductRepository=$product;
    }


     public function getById($id,$childrenCount=false)
     {
        $query= $this->ProductRepository->where('id',$id);
        if($childrenCount){
            $query->withCount('chiled');
        }
       return $query->firstOrFail();
     }

     public function store(array $data)
     {
        $product=$this->ProductRepository->create($data);
        $images=[];
        if (isset($data['images'])) {
            $i=0;
            foreach($data['images'] as $key =>$value){
                $images[$i]['image']=$this->saveImage($value,'images/products');
                $images[$i]['product_id']= $product->id;
                $i++;
            }
        }
        // dd($images);
         $product->images()->createMany($images);
        return $product;
    }


    //  public function getById($id)
    //  {

    //  }

//     public function getById($id,$childernCount=false)
//    {
//         $query = $this->ProductRepository->where('id',$id);

//         if ($childernCount)
//         {
//             $query->withCount('chiled');
//         }
//         return $query->findOrFail($id);
//    }

     public function update(array $data, $id)
     {
       $prodects=  $this->ProductRepository->getById($id);
       $prodect= $prodects->update($data);

        $images=[];
        if (isset($data['images'])) {
            $i=0;
            foreach($data['images'] as $key =>$value){
                $images[$i]['image']=$this->saveImage($value,'images/products');
                $images[$i]['product_id']= $prodect->id;
                $i++;
            }
        }
        // dd($images);
         $prodect->images()->createMany($images);
        return $prodect;
     }





}
