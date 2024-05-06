<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_images extends Model
{
    //
    protected $table ='product_images';

    protected $fillable=['id','image','product_id'];

    protected $hidden=['created_at','updated_at'];

     public function productColorSize(){
        return $this->belongsTo(product_color_size::class);}
}
