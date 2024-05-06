<?php

namespace App\Repositories;

interface RepositoryInterface
{


     public function store(array $data);
     public function update(array $data,$id);
    //  public function getById($id,$childernCount=false);


}
