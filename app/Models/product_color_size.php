<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_color_size extends Model
{

    protected $table = 'product_color_sizes';

    protected  $fillable = ['product_size_id', 'product_color_id', 'quantity', 'price_two', 'discount', 'status', 'created_at', 'updated_at'];


    public function productColor() {
        return $this->belongsTo(product_colors::class);
    }

     public function productSize(){
        return $this->belongsTo(product_sizes::class);
     }



}
