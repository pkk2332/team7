<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Checkout;
use App\Events\Testevent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProductResource as ProductResource;
use App\Http\Resources\ProductCollection as ProductCollection;

class CartController extends Controller
{

    public function data(){

      $i=0;
      
      if (session()->has('cart')) {
        foreach (session('cart') as $a) {
         $product[$i]=Product::find($a);
         $product[$i]['image']=$product[$i]->media[0]->getFullUrl();
         $i=$i+1;
     }
 }

 return response()->json([$product]);

}
public function delete1(Request $request)
{
    $id=$request->id;
    $item = session()->pull('cart', []); 
    if(($key = array_search($id, $item)) !== false) {
        unset($item[$key]);
    }

    session()->put('cart', $item);
    

    
}




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view ('customer.cart.index');

 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view ('customer.cart.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $id = $request->id;
        $username=\Auth::user()->name;
        if(session()->has('cart')){
            foreach (session('cart') as $item ) {
                if ($item==$id) {
                  \Session::flash('msg',"Item is alreday in Your Cart");
                  \Session::flash('type',"alert-warning");     
                  return back();
              }
          }
      }
      \Session::flash('msg',"Item is Successfully to Your Cart");
      \Session::flash('type',"alert-success");     
      session()->push('cart',$id);
      return view('customer.cart.index', compact('username'));
  }

  public function store1 (Request $request){
    // $checkout= Checkout::create([
    //     'user_id'=>\Auth::user()->id,
    //     'name'=>\Auth::user()->name,
    //     'tax'=>$request->tax,
    //     'subtotal'=>$request->Subtotal,
    //     'amount'=>$request->amount
    // ]);
    $allproduct=$request->products;
    $i=0;
    
    foreach($allproduct as $product){   
        $productid[$i]=$product['id'];
        $i=$i+1;
        break;
         
     }

    foreach ($allproduct as $product) {
         \Session::put('admin_id',$product['admin_id']);
        // event(new Testevent($product['admin_id']));
    }

    // $checkout->products()->attach($productid);
    // $checkout->save(); 

    
    
    
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //


    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
        Cart::remove($cart);
    }



}