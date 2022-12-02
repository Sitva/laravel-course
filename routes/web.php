<?php

use App\Http\Controllers\listingcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

Route::get('/', [listingcontroller::class, 'index']);

// Route::get('/hello', function () {
//     return response('<h1>Hello World</h1>', 200)
//         ->header('Content-Type', 'text/plain')
//         ->header('foo', 'bar');
// });

// Route::get('/posts/{id}', function($id) {
//     // ddd($id);
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request) {
//     return $request->name . ' ' . $request->city;
// });



//Show Create Form
Route::get('/listings/create', [listingcontroller::class, 'create']);

//Store Listing Data
Route::post('/listings', [listingcontroller::class, 'store']);

Route::get('/listings/{listing}', [listingcontroller::class, 'show']);

//Show Edit Form

Route::get('/listings/{listing}/edit', [listingcontroller::class, 'edit']);