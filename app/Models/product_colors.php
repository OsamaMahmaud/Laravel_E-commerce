<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_colors extends Model
{
    //
    protected $table = 'product_colors';

    protected $fillable=['color','product_id'];

    public function products(){
        return $this->belongsTo(products::class,'product_id');
    }


    public function productColorSize(){
        return $this->hasMany(product_color_size::class);
    }



}
