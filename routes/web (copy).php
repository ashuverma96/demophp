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
 'uses' => 'Controller_api_new@login']
   
);
Route::get('/pages/home',
   [
		'middleware' => 'auth',
 'uses' => 'Controller@home']
);

Route::post('/get_report',
 [
		'middleware' => 'auth',
 'uses' => 'Controller@get_report']
);

Route::post('/get_pdf_template',
   'Controller@get_pdf_template'
);
Route::post('/generate_pdf',
   'Controller@generate_pdf'
);
Route::post('/generate_pdf_fpdf',
   'Controller@generate_pdf_fpdf'
);
Route::post('/generate_pdf1',
   'Controller@generate_pdf1'
);
Route::get('/logout',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@logout',
]);

Route::post('/add',[
   'middleware' => 'auth',
   'uses' => 'Controller@add',
]);

Route::get('/pages/subscription',[
   'middleware' => 'auth',
   'uses' => 'Controller@subscription',
]);


Route::post('/get_subscription',[
   'middleware' => 'auth',
   'uses' => 'Controller@get_subscription',
]);

Route::post('/update_subscription',[
   'middleware' => 'auth',
   'uses' => 'Controller@update_subscription',
]);


Route::get('/pages/mapping',[
   'middleware' => 'auth',
   'uses' => 'Controller@mapping',
]);


Route::post('/get_pdf_template_map',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@get_pdf_template_map',
]);

Route::post('/get_fields',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@get_fields',
]);

Route::post('/get_pdf_template_map_value',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@get_pdf_template_map_value',
]);

Route::post('/get_mapped_fields',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@get_mapped_fields',
]);

Route::post('/add_mapped_fields',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@add_mapped_fields',
]);

Route::post('/get_saved_fields',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@get_saved_fields',
]);

Route::get('/pages/mapping_edit',[
   'middleware' => 'auth',
   'uses' => 'Controller@mapping_edit',
]);


Route::post('/get_pdf_template_map_edit',[
   
   'uses' => 'Controller@get_pdf_template_map_edit',
]);

Route::post('/get_fields_edit',[
   
   'uses' => 'Controller@get_fields_edit',
]);

Route::post('/get_pdf_template_map_value_edit',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@get_pdf_template_map_value_edit',
]);

Route::post('/update_mapped_fields',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@update_mapped_fields',
]);

Route::post('/get_fields_auto_complete',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@get_fields_auto_complete',
]);

Route::post('/get_pdf_template_map_value1',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@get_pdf_template_map_value1',
]);


Route::post('/make_active_inactive1',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@make_active_inactive1',
]);

Route::post('/update_mapped_fields_coordinates',[
  // 'middleware' => 'auth',
   'uses' => 'Controller@update_mapped_fields_coordinates',
]);



Route::get('/pages/mapping_api',[
  // 'middleware' => 'auth',
   'uses' => 'Controller_api_new@mapping_api',
]);

Route::get('/pages/mapping_api_edit',[
  // 'middleware' => 'auth',
   'uses' => 'Controller_api_new@mapping_api_edit',
]);

Route::post('/get_mapped_fields_api',[
  // 'middleware' => 'auth',
   'uses' => 'Controller_api_new@get_mapped_fields',
]);
Route::post('/add_mapped_fields_api',[
  // 'middleware' => 'auth',
   'uses' => 'Controller_api_new@add_mapped_fields',
]);



Route::post('/get_fields_edit_api',[
   
   'uses' => 'Controller_api_new@get_fields_edit',
]);

Route::post('/update_mapped_fields_coordinates_api',[
  // 'middleware' => 'auth',
   'uses' => 'Controller_api_new@update_mapped_fields_coordinates',
]);


Route::post('/get_pdf_template_map_edit_api',[
   
   'uses' => 'Controller_api_new@get_pdf_template_map_edit',
]);


Route::post('/get_fields_edit_api',[
   
   'uses' => 'Controller_api_new@get_fields_edit',
]);

Route::post('/get_fields_auto_complete_api',[
  // 'middleware' => 'auth',
   'uses' => 'Controller_api_new@get_fields_auto_complete',
]);



Route::post('/get_pdf_template_map_value_edit_api',[
  // 'middleware' => 'auth',
   'uses' => 'Controller_api_new@get_pdf_template_map_value_edit',
]);


Route::post('/update_mapped_fields_api',[
  // 'middleware' => 'auth',
   'uses' => 'Controller_api_new@update_mapped_fields',
]);


Route::post('/generate_pdf_pdftk',[
  // 'middleware' => 'auth',
   'uses' => 'Controller_api_new@generate_pdf_pdftk',
]);

Route::get('/mpdf',[
  // 'middleware' => 'auth',
   'uses' => 'Controller_api_new@mpdf',
]);

Route::get('/mapping_api_clear',[
  // 'middleware' => 'auth',
   'uses' => 'Controller_api_new@mapping_api_clear',
]);

Route::post('/get_form_data',[
  // 'middleware' => 'auth',
   'uses' => 'Controller_api_new@get_form_data',
]);

Route::get('/pages/add_template',[
   'middleware' => 'auth',
   'uses' => 'Controller_api_new@add_template',
]);

Route::get('/get_csrf',[
  
   'uses' => 'Controller_api_new@get_csrf',
]);
Route::post('/upload_pdf_file',[
  
   'uses' => 'Controller_api_new@upload_pdf_file',
]);

Route::post('/get_template_for_edit',[
  
   'uses' => 'Controller_api_new@get_template_for_edit',
]);

Route::post('/get_data_file',[
  
   'uses' => 'Controller_api_new@get_data_file',
]);

Route::post('/preview',[
  
   'uses' => 'Controller_api_new@preview',
]);


Route::post('/save_mapped_fields_api',[
  
   'uses' => 'Controller_api_new@save_mapped_fields',
]);

Route::post('/test_upload_pdf_file',[
  
   'uses' => 'Controller_api_new@test_upload_pdf_file',
]);

Route::any('/preview_api',[
  
   'uses' => 'Controller_api_new@preview_api',
]);

Route::any('/fdi_fn',[
  
   'uses' => 'Controller_api_new@fdi_fn',
]);

Route::post('/graphical_map',[
  
   'uses' => 'Controller_api_new@graphical_map',
]);


Route::post('/delete_mapped_fields_api',[
  
   'uses' => 'Controller_api_new@delete_mapped_fields_api',
]);


Route::any('/preview_api_graph',[
  
   'uses' => 'Controller_api_new@preview_api_graph',
]);

Route::post('/add_users',[
  
   'uses' => 'Controller_api_new@add_users',
]);

Route::post('/get_users',[
  
   'uses' => 'Controller_api_new@get_users',
]);

Route::post('/get_templates',[
  
   'uses' => 'Controller_api_new@get_templates',
]);

Route::post('/assign_templates',[
  
   'uses' => 'Controller_api_new@assign_templates',
]);

Route::post('/get_mapped_fields_user_api',[
  
   'uses' => 'Controller_api_new@get_mapped_fields_user',
]);

Route::post('/highlight_mapped_fields_api',[
  
   'uses' => 'Controller_api_new@highlight_mapped_fields_api',
]);
Route::post('/get_pdf_template_map_edit_iframe',[
  
   'uses' => 'Controller_api_new@get_pdf_template_map_edit_iframe',
]);