<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
	if (Auth::check())
	{
	    return View::make('home');
	}
	else{
		return View::make('login');
	}
});

//Route::get('pagos', function(){return View::make('pagos');});

// route to login view
Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

// route to logout
Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::group(array('before' => 'auth.custom'), function(){

	Route::get('empleados', 'EmpleadosController@index');
	Route::get('empleados/delete', 'EmpleadosController@destroy($id)');
	Route::get('pagos', 'PagosController@index');

<<<<<<< HEAD
Route::get('pagos', array('uses' => 'PagosController@index'));
=======
});

//usuario: jfeuchter
//password: 321000
>>>>>>> FETCH_HEAD
