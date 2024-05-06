<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_sizes extends Model
{

    protected $table = 'product_sizes';

    protected $fillable=['product_id','size'];

    public function Product()
    {
         return $this->belongsTo(products::class, 'product_id');
    }

    public function productColorSize()
    {
        return $this->hasMany(product_color_size::class);
    }

}
