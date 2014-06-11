<?php

class EmpleadosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$empleados = Empleado::EmpleadosInfo();

		return View::make('empleados')->with('empleados', $empleados); 
	}

	public function empleadoData($id){

		if(Request::ajax()){
			
			$empleado = DB::table('empleado')
		        ->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        ->leftJoin('empadministradora', 'empadministradora.idEmpAdminstradora', '=', 'empleado.emp_idEmpAdministradora_FK')
		        ->select('*')
		        ->where('idEmpleado', $id)
		        ->where('Activo', true)
		        ->get();

			return $empleado;
		}

	}


	public function form_crear_empleado(){		
		
		$empleado = new Empleado;

		// Template : $usuario->Nombre 	= 	Input::get('nombre');

		
		$empleado->emp_idDeparameto_FK 			= 	Input::get('emp_idDeparameto_FK');	
		$empleado->emp_idEmpresa_FK 			= 	Input::get('emp_idEmpresa_FK');
		$empleado->Nombre 						= 	Input::get('Nombre');
		$empleado->Direccion 					= 	Input::get('Direccion');
		$empleado->FechaDeIngreso				= 	Input::get('FechaDeIngreso');
		$empleado->Puesto 						= 	Input::get('Puesto');
		$empleado->Telefono 					= 	Input::get('Telefono');
		$empleado->Celular 						= 	Input::get('Celular');
		$empleado->Extension 					= 	Input::get('Extension');
		$empleado->Email 						= 	Input::get('Email');
		$empleado->Banco 						= 	Input::get('Banco');
		$empleado->Cta_Bancaria 				= 	Input::get('Cta_Bancaria');
		$empleado->CLABE_Bancaria 				= 	Input::get('CLABE_Bancaria');
		$empleado->SueldoBase 					= 	Input::get('SueldoBase');
		$empleado->emp_idTipoPeriodo_FK 		= 	Input::get('emp_idTipoPeriodo_FK');
		$empleado->emp_idEmpAdministradora_FK 	= 	Input::get('emp_idEmpAdministradora_FK');

		$empleado->save();

        return Redirect::to("/empleados");	

	}


	public function editar_empleado($id_empleado){
		$empleado = Empleado::find($id_empleado); 
		return View::make('editar_empleado', array('empleado' => $empleado)); 
	}

	public function actualizar_empleado(){

		// return Input::all();
		$empleado = Empleado::where('idEmpleado',Input::get('idEmpleado'))->first();
		$empleado->emp_idDeparameto_FK 		= 	Input::get('emp_idDeparameto_FK');	
		$empleado->emp_idEmpresa_FK 		= 	Input::get('emp_idEmpresa_FK');
		$empleado->Nombre 					= 	Input::get('Nombre');
		$empleado->Direccion 				= 	Input::get('Direccion');
		$empleado->Puesto 					= 	Input::get('Puesto');
		$empleado->Telefono 				= 	Input::get('Telefono');
		$empleado->Celular 					= 	Input::get('Celular');
		$empleado->Extension 				= 	Input::get('Extension');
		$empleado->Email 					= 	Input::get('Email');
		$empleado->Banco 					= 	Input::get('Banco');
		$empleado->Cta_Bancaria 			= 	Input::get('Cta_Bancaria');
		$empleado->CLABE_Bancaria 			= 	Input::get('CLABE_Bancaria');
		$empleado->SueldoBase 				= 	Input::get('SueldoBase');
		$empleado->emp_idTipoPeriodo_FK 	= 	Input::get('emp_idTipoPeriodo_FK');

		$empleado->save();
		return Redirect::to("/empleados");	
	}

	public function form_eliminar_empleados(){		
		
		$empleados = Input::get('empleado');
		
		if(is_array($empleados))
		{
			$contador = 0;

			//Ciclo para borrar empleados
			foreach ($empleados as $empleado) {
								
				$empleado = Empleado::where('idEmpleado',$empleados[$contador])->first();		
				$empleado->Activo = 0;
				$empleado->save();
				$contador++;
			}

		}

		return Redirect::to("/empleados");	

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		try {

			Empleado::DeleteEmpleado($id);
			
		} catch (Exception $e) {
			
			return $e;

		}
		
	}


}
