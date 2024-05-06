<?php

namespace App\Service;

use App\Traits\ImageTrait;
use App\Repositories\ProductsRepository;

class ProductsService
{
    use ImageTrait;

    public $ProRepository;

    public function __construct( ProductsRepository $ProRepository)
    {
         $this->ProRepository=$ProRepository;
    }

    public function store(array $data)
    {
        // $file_name=$this->saveImage($data->image,'images/products');
        // $data['parent_id']=$data['parent_id']??0;
        // dd($data);
        if(isset($data['image'])){
            $data['image']=$this->saveImage($data['image'],'images/products');
        }

        if(isset($data['colors'])){
            $data['colors']=implode(',' ,$data['colors']);
        }

        if(isset($data['sizes'])){
            $data['sizes']=implode(',' ,$data['sizes']);
        }

        // dd($data);

       return $this->ProRepository->store($data);
    }

    public function getById($id,$childernCount=false)
    {
        return $this->ProRepository->getById($id, $childernCount=false);
    }


    public function update( $id, $data)
    {

        if(isset($data['image'])){
            $data['image']=$this->saveImage($data['image'],'images/products');
        }

        if(isset($data['colors'])){
            $data['colors']=implode(',' ,$data['colors']);
        }

        if(isset($data['sizes'])){
            $data['sizes']=implode(',' ,$data['sizes']);
        }
        $product = $this->getById($id);
        // dd($product );

        return $product->update( $data);
    }




}
