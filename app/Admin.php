<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable=['role','category_id','c_name'];

    public function user() {
    	return $this->hasMany('App\User');
    }

    public function categories() {
		return $this->belongsTo('App\Category');
	} 


}
