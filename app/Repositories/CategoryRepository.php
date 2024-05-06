<?php

namespace App\Repositories;

use App\Models\categories;

class CategoryRepository
{
    public $categoryRepository;
    public function __construct(categories $category)
    {
        $this->categoryRepository=$category;
    }

    public function getMainCategory()
    {
        return $this->categoryRepository->where('parent_id',0)->get();
    }
   public function store(array $data)
   {
    return $this->categoryRepository->create($data);
   }

   public function getById($id,$childernCount=false)
   {
        $query = $this->categoryRepository->where('id',$id);

        if ($childernCount)
        {
            $query->withCount('chiled');
        }
        return $query->findOrFail($id);
   }

   public function update(array $data, $id)
   {
     $row=$this->getById($id);
     return $row->update($data);
   }


}
