<?php

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

// rutas de front
// index
Route::get('/index', function () {
  return view('front.index');
});

// preguntas
Route::get('/preguntas', function () {
  return view('front.preguntas');
});

// Route::get('/products', function () {
//   return view('front.products');
// });

// Route::get('/admin', function () {
//   return view('front.admin');
// });

// ruta a productos
Route::get('/productos/', 'ProductosController@index');
// ruta a productos
Route::get('/products', 'ProductosController@index');
// Hay que hacerla nueva con la nueva lista de productos

Route::get('/busqueda', 'ProductosController@search');
Route::get('/products/result', 'ProductosController@result');

// mostrar producto
Route::get('/showprod/{id}', 'ProductosController@show');

Route::get('/prodmalbec/', 'ProductosController@varietalMalbec');
Route::get('/prodcabernet/', 'ProductosController@varietalCabernet');
Route::get('/prodtorrontes/', 'ProductosController@varietalTorrontes');


//-----------------------------------------------------

// ruta a index de admin
Route::get('/admin', 'AdminController@index')->middleware('isAdmin');

// dispara el guardado en la bd
Route::post('/admin', 'AdminController@store');

// ruta a formulario de crear vino
Route::get('/create', 'AdminController@create');

// seek and destroy del producto
Route::delete('/admin/{id}', 'AdminController@destroy');

// mostrar producto
Route::get('/show/{id}', 'AdminController@show');

// edit de producto
Route::get('/edit/{id}', 'AdminController@edit');
// guarda el prod editado, en tu cara error de sintaxis
Route::put('/admin/edit/{id}', 'AdminController@update');


Auth::routes();
Route::get('/home', 'HomeController@index');

//-----------------------------------------------------

// ruta a registración
// Route::get('/registrarme', function () {
//   return view('front.register');
// });
// ahora funcionan el register de laravel directamente

// cerrar sesion
 Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// ruta a perfil de usuario
// Cambiar a post

 /*Auth::routes();
 Route::get('/home', 'HomeController@index');/*->name('home')*/

// Route::get('/profile', function () {
// 	if (Auth::user()) {
// 		echo "Hola " . Auth::user()->name . "<br>";
// 		echo "<img src='/storage/avatars/" . Auth::user()->avatar . "' width='100' /><br>";
// 	} else {
// 		return redirect('/register');
// 	}
// })->name('profile');
