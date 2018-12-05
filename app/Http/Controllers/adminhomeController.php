<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use PDF;
use App\SubCategory;
use App\Exports\CheckProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\DataTables\ProductDatatable;
use App\DataTables\CheckoutDataTable;
use Yajra\Datatables\Datatables;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\Checkoutresource as Checkout;
use App\Events\Testevent;

class adminhomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct() 
    {
       $this->middleware(['auth','role:admin|superadmin']);
    }

    
    public function index(ProductDatatable $product)
    {
        // $admin_id=\Auth::user()->admin_id;
        // $admin=Admin::find($admin_id);
        // $c_id=$admin->category_id;

         return $product->render('admin.index');

    }
    public function delete(Request $request){
        
    }
    public function pushphoto(Request $request)
    {   
        $pathid=$request->pathid;
        $oldname=$request->name;
        $file_name =$request->file('file')->getClientOriginalName();
       
        $product=Product::find($request->id);

        $media=$product->media[$request->index];

        $media->file_name=$file_name;

        $media->mime_type=$request->type;
        
        $media->size=$request->size;
       
         $media->save();

         if (file_exists(public_path("/storage/$pathid/$oldname"))) {
              unlink(public_path("/storage/$pathid/$oldname"));
        }
    $request->file('file')->storeAs("public/$pathid/", $file_name);

        return response()->json(['success']);
    }




    public function data(){

        if (\Auth::user()->admin_id==1) {
           $products=DB::table('products');
           return Datatables::of($products)
           ->addColumn("edit",function($products){
            return '<a class="btn btn-success btn-sm" href="' . route("admin.edit", $products->id) .'">Edit</a>';
        })
           ->addColumn("delete",function($products){
             $response = '<form action="' . route("admin.destroy", $products->id) .'"
             method="post">' . 
             csrf_field() . 
             '<input type="hidden" name="_method" value="delete">
             <button class="btn btn-danger btn-sm" type="submit">Delete</button>';
             return $response;
         })
           ->rawColumns(['edit','delete'])
           ->make(true);

       }
       else
       {

           $products=DB::table('products')->where('admin_id',\Auth::user()->admin_id);
           return Datatables::of($products)
           ->addColumn("edit",function($products){
            return '<a class="btn btn-success btn-sm" href="' . route("admin.edit", $products->id) .'">Edit</a>';
        })
           ->addColumn("delete",function($products){
             $response = '<form action="' . route("admin.destroy", $products->id) .'"
             method="post">' . 
             csrf_field() . 
             '<input type="hidden" name="_method" value="delete">
             <button class="btn btn-danger btn-sm" type="submit">Delete</button>';
             return $response;
         })
           ->rawColumns(['edit','delete'])
           ->make(true);

       }
   }





   public function data1(Request $request){
    $rm=$request->id;

    $images=Product::find($rm);
    return new ProductResource($images);
}


public function noti(){
    $id=\Auth::user()->admin_id;

    $noti=\DB::table('user_checkouts')
     ->where('adminid',$id)
    ->where('seen',false)->get();

    return response()->json([$noti]);


}




    public function userdata(Request $request){
        $rm = $request->id;
        
        $user = User::find($rm);
        return new Checkout($user);
    }

    //unseen to seen
   public function change(){
        $id=\Auth::user()->id;
        $user=User::find($id);
        $user->seen=true;
        $user->save();
        return redirect('/admin');
   }





    //for superadmin checkout
    public function checkout(CheckoutDataTable $checkout){
        return $checkout->render('admin.checkout');
    }






    //for admin checkout
    public function admincheckout(){
        $admin_id=\Auth::user()->admin_id;
        $allproduct=DB::table('user_checkouts')->where('adminid',$admin_id)->get();
        
        return view("admin.admincheckout",compact("allproduct"));
    }
    //for downloading single pdf file

    public function downloadsinglepdf($id){
        $detail=DB::table('user_checkouts')->where('id',$id)->get();
        
        foreach ($detail as $v) {
            $pdf = PDF::loadView('pdf', compact('v'));
        }
         
        return $pdf->download('report.pdf');
    }
    //for downloading all pdf file

    public function downloadall(){
        $admin_id=\Auth::user()->admin_id;
        $gg=DB::table('user_checkouts')->where('adminid',$admin_id)->get();
        $pdf = PDF::loadView('allpdf', compact('gg'));
         return $pdf->download('All reports.pdf');
    }
    //for downloading excel file
    public function downloadexcel(){
        return Excel::download(new CheckProductsExport, 'all reports.xlsx');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id=\Auth::user()->admin_id;
        $admin=Admin::find($id);
        $c_id=$admin->category_id;
        $subcategories = SubCategory::where('category_id',$c_id)->pluck('name','id');

        return view("admin.create",compact("subcategories"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
    {
        //
        $admin_id=\Auth::user()->admin_id;
        $admin=Admin::find($admin_id);
        $c_id=$admin->category_id;

        $request->validate(Product::$rules);

        $product = Product::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'price' => $request->price,
            'category_id'=>$c_id,
            'admin_id'=>\Auth::user()->admin_id
        ]);
       // dd($request->sub_categories);

        $files=$request->file('file');
        foreach ($files as $file) {
            $product->addMedia($file)->toMediaCollection();
        }
        $product->subcategories()->attach($request->sub_categories);
        $product->save();
        \Session::flash('msg', 'New Product has been added successfully.');
        \Session::flash('type', 'alert-success');

    }


    public function store(Request $request)
    {
        //
        $admin_id=\Auth::user()->admin_id;
        $admin=Admin::find($admin_id);
        $c_id=$admin->category_id;

        $request->validate(Product::$rules);
        $product = Product::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'price' => $request->price,
            'category_id'=>$c_id,
            'admin_id'=>\Auth::user()->admin_id

        ]);
       // dd($request->sub_categories);
        $files=$request->file('file');
        foreach ($files as $file) {
            $product->addMedia($file)->toMediaCollection();

        }
        $product->subcategories()->attach($request->sub_categories);
        // dd($product);
        $product->save();

        
        return redirect('admin');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=\Auth::user();
        $product=Product::find($id);
        if ($user->can('update',$product)){

            $images=Product::find($id)->getMedia();
            response()->json(["data"=>$id]);
            return view('admin.edit',compact('images','product'));
            
        }

        else{
        // echo "not allowed";
           \Session::flash('msg', 'You are not allowed to Edit the Product!!!!');
           \Session::flash('type', 'alert-danger');

           // return redirect()->back();
           return abort('403');
       }
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
        $product=Product::findOrFail($id);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->save();
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=\Auth::user();
        $product=Product::find($id);
        if($user->can('delete',$product)){
            $product->delete();
            $images= $product->getMedia();
            foreach ($images as $image) {
              $image->delete();
          }
         \Session::flash('msg', 'Product has been successfully deleted');
         \Session::flash('type', 'alert-success');

          return redirect('admin');
      }


  }

}
