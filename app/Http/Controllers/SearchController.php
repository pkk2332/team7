<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class SearchController extends Controller
{
	public function search(Request $request) 
	{
		$s = $request->search;
		$category1 = Category::all();

		$c = Product::where('name','LIKE','%'.$s.'%' )->get();

		return view ('customer.search',compact('c','category1'));
	}
}