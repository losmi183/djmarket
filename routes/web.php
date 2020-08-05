<?php

use Gloudemans\Shoppingcart\Facades\Cart;

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

Route::get('/', 'LandingPageController@index')->name('landing-page');
Route::get('/about', function(){
    return view('about');
})->name('about');


// Shop and Product Routes
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');


// Cart Routes
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');

// Update Quantity With Ajax / Axios
Route::patch('/cart/{rowId}', 'CartController@update')->name('cart.update');

Route::delete('/cart/{rowId}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');



// Remove form saveForLater and Back to default Cart
Route::delete('/saveForLater/{rowId}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/backToCart/{rowId}', 'SaveForLaterController@backToCart')->name('saveForLater.backToCart');

// Cart Helpers Routes
// Show Cart
Route::get('/showCart', function(){
    dd(Cart::content());
});
// Show SaveforLater Cart
Route::get('/saveForLater', function(){
    dd(Cart::instance('saveForLater')->content());
});
// Destroy Cart
Route::get('/destroyCart', function(){
    Cart::destroy();
});
// Destroy SaveforLater Cart
Route::get('/destroySafeForLater', function(){
    Cart::instance('saveForLater')->destroy();
});

Route::get('/sessionShow', function(){
    dd(session()->get('discount'));
});

Route::get('/sessionDel', function(){
    session()->forget('discount');
});


// Checkout Routes
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');


Route::post('/coupon', 'CouponsController@apply')->name('coupon.apply');
Route::delete('/coupon', 'CouponsController@remove')->name('coupon.remove');





Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');



/*
*
* Admin Routes
*
*/
Route::get('/admin', 'DashboardController@index')->name('admin.dashboard')->middleware('publisher');
Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');
Route::resource('users', 'UsersController')->middleware('admin');




// Auth Routes

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
