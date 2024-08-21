<?php
use App\Commentonproject;
use App\Newproject;
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

Route::get('/','Userscontroller@welcome');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/newprojectinsert','HomeController@newprojectinsert');
Route::post('/storeproject','HomeController@storeproject');
Route::get('/Read/{id}','Userscontroller@Readstory');
Route::post('/Comenttostory','Userscontroller@Comenttostory');
Route::get('Previous/{id}', 'Userscontroller@Previous');
Route::get('Next/{id}', 'Userscontroller@Next');
Route::get('/viewprojectsented', 'HomeController@viewprojectsented');
Route::post('/comentontheproject', 'HomeController@comentontheproject');
Route::get('/commentonproject/{id}','HomeController@commentonproject');


Route::get('/Message', 'Userscontroller@Messages');
Route::get('/newrole', 'HomeController@newrole');
Route::get('/setting', 'HomeController@setting');
Route::post('/postpermission', 'HomeController@postpermission');
Route::post('/postrole', 'HomeController@postrole');
Route::get('/viewstory', 'HomeController@viewstory');
Route::get('/newuser', 'HomeController@newuser');
Route::post('admin/newuser', 'HomeController@storenewuser');
Route::get('all/user', 'HomeController@alluser');
Route::get('/edituser/{id}','HomeController@edituser');
Route::any('/admin/updateuser', 'HomeController@updateuser');
Route::post('/roleupdate/{id}', 'HomeController@roleupdate');
Route::get('/newproduct', 'HomeController@newproduct');
Route::post('/postnewproduct', 'HomeController@postnewproduct');
Route::get('/newcompany', 'HomeController@newcompany');

Route::post('/insertnewcompany', 'HomeController@insertnewcompany');
Route::any('/indexcreatecompany', 'HomeController@indexcreatecompany');
Route::any('/storeinternaship', 'HomeController@storeinternaship');

Route::any('/addreportoftheweek/{id}', 'HomeController@addreportoftheweek');
Route::any('/postweekreport', 'HomeController@postweekreport');
Route::any('/allcompany', 'HomeController@allcompany');





Auth::routes(['register' => true]);

