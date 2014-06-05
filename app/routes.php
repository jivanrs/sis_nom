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
	Route::post('empleado/crear' , 'EmpleadosController@form_crear_empleado');
	Route::post('eliminar_empleados' , 'EmpleadosController@form_eliminar_empleados');
	Route::get('empleados/delete', 'EmpleadosController@destroy($id)');
	Route::get('pagos', 'PagosController@index');
	Route::get('reportes', 'ReportesController@index');
<<<<<<< HEAD
	Route::get('reportes/empleados/{fechaIni}/{fechaFin}', 'ReportesController@reporteEmpleados($fechaIni, $fechaFin)');
	Route::get('generarNomina', 'PagosController@generarNomina()');
	Route::get('reportes/empresas/{fechaIni}/{fechaFin}', 'ReportesController@reporteEmpresa($fechaIni, $fechaFin)');
	Route::get('reportes/departamentos/{fechaIni}/{fechaFin}', 'ReportesController@reporteDepto($fechaIni, $fechaFin)');
	Route::get('home', function(){
		return View::make('home');
	});

=======
	Route::post('reportes/empleados/{fechaIni}/{fechaFin}', 'ReportesController@reporteEmpleados($fechaIni, $fechaFin)');
	Route::post('reportes/empresas/{fechaIni}/{fechaFin}', 'ReportesController@reporteEmpresa($fechaIni, $fechaFin)');
	Route::post('reportes/departamentos/{fechaIni}/{fechaFin}', 'ReportesController@reporteDepto($fechaIni, $fechaFin)');
	Route::post('realizarPago/{idEmpleado}', 'PagosController@realisarPago($idEmpleado)');
	Route::post('realizarPagoEspecial/{idEmpleado}', 'PagosController@realisarPagoEspecial($idEmpleado)');
>>>>>>> FETCH_HEAD

});

//usuario: jfeuchter
//password: 321000
