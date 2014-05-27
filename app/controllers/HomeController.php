<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function doLogin()
	{
		// process the form
		// validate the info, create rules for the inputs
		$rules = array(
			'usuario'    => 'required|alphaNum', 
			'password' => 'required|alphaNum|min:3'
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'Usuario' 	=> Input::get('usuario'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata, Input::get('chkBox'))) {

				$empleados = DB::table('empleado')
		        ->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        ->get();

				return View::make('empleados', array('empleados' => $empleados)); 

			} else {	 	
				
				return Redirect::to('/')->with('login_error',true);

			}

		}
	}

	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('login'); // redirect the user to the login screen
	}

	public function lista_usuarios(){ 
		$usuarios = User::all(); 
		return View::make('usuario.lista_usuarios', array('usuarios' => $usuarios)); 
	}

	public function detalles_usuario($id_usuario){ 
		$empleados = DB::table('usuarios')->lists('Nombre', 'name');
		return View::make('empleado.show_Empleado', array('empleados' => $empleados)); 
	}


}
