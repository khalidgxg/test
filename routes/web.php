<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome',function(){

    return view('welcome');
})->name("a");

// اختصار للرابط بدال ما يكون اسمه ولكمم عشانن لو بنستخدمه داخل الفيو يكون مختصر وبدال ما نستخدم url 
//نستخدم حاجه اسمها route("name of url")
//موضحه في الفيو
Route::namespace("Admin")->group(function(){

    Route::get('users', "TestController@show");//App\Http\Controllers\Admin\TestController@show

    // مافي داعي نكتب الامتداد كامل لانه النايم سبيس يختصر عليك
        
    
});

Route::group(['prefix' => 'aedmin'], function () {
    
    Route::any('user', function ( ){
        return "admin/user";
    })->name('adus');
    Route::get('customer', function ( ){
        return "admin/customer";
    });
});

Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::any('user', function ( ){
        return "admin/user";
    })->name('adus');
});

// Route::get('s1', 'test2@s1')->middleware('auth');

// Route::group(['middleware'=>'auth'],function () {

//     Route::get('s1', 'test2@s1');
//     Route::get('s2', 'test2@s2');
//     Route::get('s3', 'test2@s3');

// });

Route::get('s1', 'test2@s2');


// Route::get('test', 'test5Controller@index');
// Route::get('test/create', 'test5Controller@create');
// Route::post('test', 'test5Controller@store');
// Route::get('test/{id}', 'test5Controller@show');
// Route::get('test/{id}/edit', 'test5Controller@edit');
// Route::put('test/{id}', 'test5Controller@update');
// Route::get('test/{id}', 'test5Controller@destory');

Route::resource('test', 'test5Controller'); // هنا يختصر عليك الي فوقه حيث يضم جميع الدوال فقط نحفظ الرابط حق كل واحد 

Route::get("/we/{name?}","khalid@we");

Route::get("/","testController@test");

Route::view('ww', 'test2');
















Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//

Route::group(['prefix' => 'Offers'], function () {
    
    Route::get('fillable', 'CrudController@getOffers');

    Route::get('store ', 'CrudController@store');

    // Route::get('create', 'CrudController@create');

    // Route::post('create', 'CrudController@create')->name('create');

    
    Route::match(['get', 'post'], 'create','CrudController@create')->name('create');

  

});

