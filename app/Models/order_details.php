<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    //

     protected $table = 'order_details';

     protected   $fillable=[ 'quantity', 'price', 'discount', 'order_id', 'product_color_size_id', 'created_at', 'updated_at' ];


       public function product_colors() {

          return $this->belongsTo(orders::class);

       }

       public function productColorSize() {

        return $this->belongsTo(product_color_size::class);

     }



}
