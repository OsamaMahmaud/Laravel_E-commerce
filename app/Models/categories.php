<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categories extends Model
{
    use softDeletes;

     protected $table = 'categories';
     protected   $fillable=['name','image','parent_id','deleted_at'];

      public function chiled()
      {
        return  $this->hasMany(categories::class,'parent_id');
      }

       public function parent()
       {
         return  $this->belongsTo( categories::class, 'parent_id');
       }

     public function product()
     {
        return $this->hasMany(products::class,'category_id');
     }


}
