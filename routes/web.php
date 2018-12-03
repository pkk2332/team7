<?php
use App\Http\Resources\Product as ProductResource;
use App\Product;
use App\Events\Testevent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});
Route::get('admin/register', 'AdminRegisterController@showRegistrationForm')->name('adminregister');
Route::post('admin/register', 'AdminRegisterController@register');


Route::post('cart/save', 'CartController@store1');

Route::post('cart/delete', 'CartController@delete1');



Route::post('admin/save', 'adminhomeController@store1');
Route::post('admin/pushphoto', 'adminhomeController@pushphoto');
Route::post('admin/delete','adminhomeController@delete');
Route::get("admin/data","adminhomeController@data")->name("admin.data");
Route::get("admin/data1","adminhomeController@data1")->name("admin.data1");
Route::get("admin/checkout", "adminhomeController@checkout")->name("admin.checkout");
Route::get('admin/downloadexcel','adminhomeController@downloadexcel')->name('downloadexcel');

Route::get('admin/admincheckout','adminhomeController@admincheckout')->name('admincheckout');

Route::get('admin/singlepdf/{id}','adminhomeController@downloadsinglepdf')->name('downloadsinglepdf');
Route::get('admin/allpdf','adminhomeController@downloadall')->name('allpdf');


Route::get("admin/userdata", "adminhomeController@userdata")->name("admin.userdata");


Route::get("cart/data","CartController@data")->name("cart.data");
Route::get('product/vote','UserController@vote')->name("product.vote");

Route::get('product/all',"UserController@all")->name('all');

Route::resource("admin","adminhomeController");
Route::resource('cart', 'CartController');
Route::resource("product", "UserController");
Route::resource("subcategory", "SubCategoryController");


Route::get("Search",'SearchController@search')->name('search');




//Auth::routes();

 // Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
 //        Route::post('login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');




Route::get('login', 'SingleLoginController@showLoginForm')->name('login');
Route::post('login', 'SingleLoginController@login');
Route::post('logout', 'SingleLoginController@logout')->name('logout');

        // Registration Routes...

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


        // Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');





Route::get('/home', 'HomeController@index')->name('home');

// Route::middleware(["superadminauth"])->group(function(){
	// Route::resource("product", "ProductController");
// 	Route::resource("category", "CategoryController");
// });







// Route::middleware(['entryadminauth'])->group(function(){
//     Route::get("/product","ProductController@index");
//     Route::get("/product/edit","ProductController@edit");
// });



