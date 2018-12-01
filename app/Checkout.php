<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable =['id','amount','tax','subtotal','user_id','name'];
    
	public function products() {
		return $this->belongsToMany('App\Product', 'user_checkouts');
	}

}
