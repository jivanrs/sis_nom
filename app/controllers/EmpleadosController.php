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


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	public function form_crear_empleado(){		
		
		$empleado = new Empleado;

		// Template : $usuario->Nombre 	= 	Input::get('nombre');

		
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
