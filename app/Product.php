<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Product extends Model implements HasMedia
{
    //
    use HasMediaTrait;
 //    protected $table = 'products';
	// protected $dates = ['deleted_at'];
	protected $fillable = [
		'name','quantity',
		'description',
		'price',
		'category_id',
		'admin_id',
		'votes',
		'views'
	];
	public static $rules = [
		'name'  => 'required|min:2',
		'quantity' => 'required|numeric',
		'price' => 'required|numeric',
		'description' => 'required',
		'sub_categories'    => 'required|array'
	];
	public function categories() {
		return $this->belongsTo('App\Category');
	}

	public function subcategories() {
		return $this->belongsToMany('App\SubCategory', 'product_sub_category');
	}

		public function usercheckouts() {
		return $this->belongsToMany('App\Checkout', 'user_checkouts');
	}
	
}
