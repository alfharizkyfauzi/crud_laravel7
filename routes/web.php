<?php



use App\Http\Controllers\CrudController;
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
    return view('index');
});

Route::get('crud', 'CrudController@index')->name('crud');
Route::get('crud/tambah', 'CrudController@tambah')->name('crud.tambah');
Route::post('crud/simpan', 'CrudController@simpan')->name('crud.simpan');
Route::delete('crud/delete/{id}', 'CrudController@delete')->name('crud.delete');
Route::get('crud/{id}/edit', 'CrudController@edit')->name('crud.edit');
Route::patch('crud/{id}', 'CrudController@update')->name('crud.update');
