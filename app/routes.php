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
	
	Route::get('home', function(){
		return View::make('home');
	});
	
	Route::get('empleados', 'EmpleadosController@index');
	Route::get('editar_empleado/{id_empleado}', 'EmpleadosController@editar_empleado');
	Route::post('actualizar_empleado' , 'EmpleadosController@actualizar_empleado');

	Route::post('empleado/crear' , 'EmpleadosController@form_crear_empleado');
	Route::post('eliminar_empleados' , 'EmpleadosController@form_eliminar_empleados');
	Route::get('pagos', 'PagosController@index');
	Route::get('reportes', 'ReportesController@index');
	
	Route::post('reportes/empleados/{fechaIni}/{fechaFin}', 'ReportesController@reporteEmpleados');
	Route::post('reportes/empresas/{fechaIni}/{fechaFin}', 'ReportesController@reporteEmpresa');
	Route::post('reportes/departamentos/{fechaIni}/{fechaFin}', 'ReportesController@reporteDepto');
	
	// Route::post('realizarPago/{idEmpleado}', 'PagosController@realizarPago($idEmpleado)');
	Route::post('realizarPago', 'PagosController@realizarPago');
	Route::post('realizarPagoEspecial/{idEmpleado}', 'PagosController@realizarPagoEspecial');
	Route::post('generarNomina', 'PagosController@generarNomina');
	Route::post('mostrarPorPagar', 'PagosController@mostrarPorPagar');

	Route::get('empleadoData/{id}', 'EmpleadosController@empleadoData');
});

//usuario: jfeuchter
//password: 321000
