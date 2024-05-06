<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //
    protected $table = 'orders';
    protected  $fillable=['status', 'payment_method', 'payment_status', 'payment_id', 'total_price', 'adress', 'phone', 'email', 'name', 'surname', 'city', 'postal_code', 'country', 'shipping_price', 'user_id', 'created_at', 'updated_at'];

     public function user() {
        return $this->belongsTo(User::class, 'user_id');}
}
