<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[
  
 'uses' => 'Controller@index',
]);

Route::post('/home/login',
	[
	//	'middleware' => 'auth',
   'uses' => 'Controller@login']
   
 );
Route::get('/home',
 [
  'middleware' => 'auth',
  'uses' => 'Controller@home']
);



Route::get('/details',[
  'middleware' => 'auth',
 'uses' =>'Controller@home_details']
);
Route::post('/add_wheat',
 'Controller@add_wheat'
);


Route::get('/get_wheat_details',
 'Controller@get_wheat_details'
);

Route::get('/download/{id}',
 'Controller@download'
);




Route::get('/rice',
 [
  'middleware' => 'auth',
  'uses' => 'Controller@rice']
);

Route::get('/rice_sona',
 [
  'middleware' => 'auth',
  'uses' => 'Controller@rice_sona']
);


Route::get('/rice_other',
 [
  'middleware' => 'auth',
  'uses' => 'Controller@rice_other']
);

Route::get('/other_details',
 [
  'middleware' => 'auth',
  'uses' => 'Controller@other_details']
);
Route::get('/rice_details',[
  'middleware' => 'auth',
 'uses' =>'Controller@rice_details']
);


Route::get('/rice_sona_details',[
  'middleware' => 'auth',
 'uses' =>'Controller@rice_sona_details']
);
Route::post('/add_rice',
 'Controller@add_rice'
);
Route::post('/add_rice_sona',
 'Controller@add_rice_sona'
);
Route::post('/add_other',
 'Controller@add_other'
);
Route::get('/get_rice_details',
 'Controller@get_rice_details'
);
Route::get('/get_rice_details_sona',
 'Controller@get_rice_details_sona'
);
Route::get('/download/{id}',
 'Controller@download'
);
Route::get('/get_other_details',
 'Controller@get_other_details'
);

Route::get('/logout',[
  // 'middleware' => 'auth',
 'uses' => 'Controller@logout',
]);
/*     ---------------          */