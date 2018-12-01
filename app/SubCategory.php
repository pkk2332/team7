<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $fillable=['category_id','name'];


    public function categories() {
    	return $this->belongsTo('App\Category');
    }

    public static $rules = [
    	'name' =>'required|min:2'
    ];
    public function products() {
    	return $this->belongsToMany('App\Product', 'product_sub_category');
    }
}
