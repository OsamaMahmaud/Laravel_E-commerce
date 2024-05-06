<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_addresses extends Model
{
    //
    protected $table = 'user_addresses';

    protected  $fillable = [ 'name', 'address', 'city', 'state', 'country', 'postal_code', 'phone', 'email', 'surname', 'user_id', 'created_at', 'updated_at', 'deleted_at'];


     public function User() {
        return $this->belongsTo(User::class,'userid');}
}

