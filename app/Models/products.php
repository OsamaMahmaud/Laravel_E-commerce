<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class products extends Model
{
    use SoftDeletes;
    //
    protected $table ="products";
    protected $fillable=['name','description','image', 'price', 'discount_price','quantity','colors','sizes','category_id', 'created_at', 'updated_at', 'deleted_at'];

   //category  relationship
    public function Category()
    {
        return $this->belongsTo(categories::class,'category_id');
    }

    //colors  relationship
    public function productColor(){
        return $this -> hasMany(product_colors::class, 'product_id');

    }

    //size  relationship
    public function productSize(){
        return $this -> hasMany(product_sizes::class, 'product_id');

    }

    public function productColorSize(){
        return $this->hasMany(product_color_size::class, 'product_id');
    }

     public function images(){
        return $this->hasMany(product_images::class,'product_id');
     }




}
