<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $category=Category::paginate(5);
        $category1 = Category::all();
        $product=null;
        $i=0;

        foreach($category as $c)
        {

            $product[$i]=Product::where('category_id',$c->id)->inRandomOrder()->take(4)->get();
            $i=$i+1;
        }
        $username = \Auth::user()->name;

        return view('customer.index',compact('category','product','username ','category1' ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request){
        $category1 = Category::all();
        $category_id=$request->id;
        $category = Category::find($category_id);
        $cname = $category->name;
        $products=Product::where('category_id',$category_id)->get();
        return view('customer.all_products',compact('products','category1','cname'));
    }
    public function show($id)
    {
        $product = Product::find($id);
        $product->views=$product->views+1;
        $product->save();
        $subs = $product->subcategories()->get();
        $category = Category::find($product->category_id);
        $username = Auth::user()->name;
        $category1 = Category::all();

        $interested = Product::inRandomOrder()->take(3)->get();

        return view ('customer.details',compact('product','category','username','subs','interested','category1'));
    }
    public function vote(Request $request){
        $product=Product::find($request->id);
        $product->votes=$product->votes+1;
        $product->save();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
