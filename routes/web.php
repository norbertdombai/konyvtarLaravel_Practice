<?php
use App\Http\Controllers\KonyvtarController;
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

Route::get('/export',[KonyvtarController::class, 'KonyvtarExportToJson']);

Route::get('/konyvtar', [KonyvtarController::class, 'index'])->name('konyvtar.index');

Route::post('/konyvtar/create', [KonyvtarController::class, 'create'])->name('konyvtar.create');

Route::delete('/delete/{id}', [KonyvtarController::class, 'deleteRow']);