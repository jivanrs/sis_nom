
<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="http:////cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de nomina Danilo Black</title>
    <link href="css/styles.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdn.datatables.net/1.10.0/css/jquery.dataTables.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
    $(document).ready(function(){
      
      $('#btn-elim-a').click(function(){
        $('#btn-elim-b').click();
      });

      $('.btn_elim').click(function(){
        //alert(1);
        $('#btn_cf_elim').attr('value',$(this).attr('value'));
      });

      $('#myTable').dataTable();

    });

    function reply_click(clicked_id)
    {
        $.get('empleadoData/'+clicked_id , function(data){

          $('#empleado_id').attr('value',data[0].idEmpleado);
          $('#nombre_in').attr('value',data[0].Nombre);
          $('#direccion_in').attr('value',data[0].Direccion);
          $('#puesto_in').attr('value',data[0].Puesto);
          $('#telefono_in').attr('value',data[0].Telefono);
          $('#celular_in').attr('value',data[0].Celular);
          $('#extension_in').attr('value',data[0].Extension);
          $('#email_in').attr('value',data[0].Email);
          $('#banco_in').attr('value',data[0].Banco);
          $('#ctabancaria_in').attr('value',data[0].Cta_Bancaria);
          $('#clabe_in').attr('value',data[0].CLABE_Bancaria);
          $('#sueldo_in').attr('value',data[0].SueldoBase);
          $('#fechaing').attr('value',data[0].FechaDeIngreso);

          $('#sel_dep option[value="'+data[0].idDepartamento+'"]').attr("selected", "selected");
          $('#sel_emp option[value="'+data[0].idEmpresa+'"]').attr("selected", "selected");
          $('#sel_per option[value="'+data[0].idTipoPeriodo+'"]').attr("selected", "selected");
          $('#sel_empa option[value="'+data[0].idEmpAdministradora+'"]').attr("selected", "selected");
          
        });
    }


    function delete_click(clicked_id)
    {
        $.post('eliminar_empleados/'+clicked_id, function(data){
          window.location = "empleados";
        });
    }    

    </script>


  </head>
  <body>
    <!--Header-->
<div class="header">
  <div class="content-header">
        <div class="logodb">
            <a href="{{ URL::to('/') }}"><img src="images/logodb.png" /></a>
        </div>
        <div class="logodanilo">
            <a href="{{ URL::to('/') }}"><img src="images/logo-db.jpg" /></a>
        </div>
    </div>
</div>
<div class="container">
  <div class="row">
    <div class="panel panel-default mt20">
    <div class="panel-heading">
      <div class="col-md-2 col-md-offset-9">
        <button class="btn btn-default btn-info" type="button" data-toggle="modal" data-target="#myModalNuevo">Nuevo Empleado</button>

        
        <!-- Ventana para agregar un empleado nuevo -->
        <div class="modal fade" id="myModalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalNuevo" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Empleado nuevo</h4>

                <?php $departamentos = Departamento::all(); ?>
                <?php $empresas = Empresa::all(); ?>
                <?php $tipos = TipoPeriodo::all(); ?>
                <?php $empadministradora = EmpAdministradora::all(); ?>

              </div>
              <div class="modal-body" style="padding-bottom: 0;">
                {{Form::open(array('url'=>'empleado/crear'))}}
                <table class="table table-striped">
                  
                  <tr>
                    <td>{{Form::label('departamento','Departamento')}}</td>
                    <td>
                      <select name="emp_idDeparameto_FK">
                        <option value="None">Selecciona Una Opción</option>
                        @foreach($departamentos as $departamento)
                        <option value="{{$departamento->idDepartamento}}">{{$departamento->Nombre_Depto}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td>{{Form::label('empadministradora','Empresa Administradora')}}</td>
                    <td>
                      <select name="emp_idDeparameto_FK">
                        <option value="None">Selecciona Una Opción</option>
                        @foreach($empadministradora as $emp)
                        <option value="{{$departamento->idDepartamento}}">{{$emp->EmpAdministradora}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td>{{Form::label('empresa','Empresa')}}</td>
                    <td>                   
                      <select name="emp_idEmpresa_FK">
                        <option value="None">Selecciona Una Opción</option>               
                        @foreach($empresas as $empresa)
                        <option value="{{$empresa->idEmpresa}}">{{$empresa->Nombre_Empresa}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>
                 
                  <tr>
                    <td>{{Form::label('nombre','Nombre')}}</td>
                    <td>{{Form::text('Nombre','')}}</td>
                  </tr>
                                   
                  <tr>
                    <td>{{Form::label('direccion','Direccion')}}</td>
                    <td>{{Form::text('Direccion','')}}</td>
                  </tr>

                  <tr>
                    <td>{{Form::label('puesto','Puesto')}}</td>
                    <td>{{Form::text('Puesto','')}}</td>
                  </tr>

                  <tr>
                    <td>{{Form::label('fechaing','Fecha de Ingreso')}}</td>
                    <td>{{Form::text('Fecha de Ingreso', 'AAAA-MM-DD')}}</td>
                  </tr>
                  
                  <tr>
                    <td>{{Form::label('telefono','Telefono')}}</td>
                    <td>{{Form::text('Telefono','')}}</td>
                  </tr>
                  
                  <tr>
                    <td>{{Form::label('celular','Celular')}}</td>
                    <td>{{Form::text('Celular','')}}</td>
                  </tr>
               
                  <tr>
                    <td>{{Form::label('extension','Extension')}}</td>
                    <td>{{Form::text('Extension','')}}</td>
                  </tr>
                                    
                  <tr>
                    <td>{{Form::label('email','Email')}}</td>
                    <td>{{Form::email('Email','')}}</td>
                  </tr>
               
                  <tr>
                    <td>{{Form::label('banco','Banco')}}</td>
                    <td>{{Form::text('Banco','')}}</td>
                  </tr>
               
                  <tr>
                    <td>{{Form::label('cta_bancaria','Cuenta Bancaria')}}</td>
                    <td>{{Form::text('Cta_Bancaria','')}}</td>
                  </tr>
                                                                              
                  <tr>
                    <td>{{Form::label('clabe_bancaria','CLABE Bancaria')}}</td>
                    <td>{{Form::text('CLABE_Bancaria','')}}</td>
                  </tr>
                                                                                                   
                  <tr>
                    <td>{{Form::label('sueldo_base','Sueldo Base')}}</td>
                    <td>{{Form::text('SueldoBase','')}}</td>
                  </tr>   

                  <tr>
                    <td>{{Form::label('tipo_periodo','Tipo de Periodo')}}</td>
                    <td>
                      <select name="emp_idTipoPeriodo_FK">
                        <option value="None">Selecciona Una Opción</option>
                        @foreach($tipos as $tipo)
                        <option value="{{$tipo->idTipoPeriodo}}">{{$tipo->TipoPeriodo}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>

                </table>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              {{Form::close()}}
            </div>
          </div>
        </div>

        <!-- Ventana para confirmar eliminacion -->
        <div class="modal fade" id="elima_modal" tabindex="-1" role="dialog" aria-labelledby="myModalNuevo" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Eliminar empleado</h4>
              </div>
              <div class="modal-body" style="padding-bottom: 0;">
                Confirmación para eliminación de empleado:
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" type="button" value="" id="btn_cf_elim" onClick="delete_click(this.value)">Eliminar</button>
              </div>
            </div>
          </div>
        </div> 

      </div>
      
      <div class="col-md-1">
        {{ Form::open(array('url' => 'logout', 'method' => 'get')) }} 
        {{ Form::submit('LogOut', array('class' => 'btn btn-primary')) }} 
        {{ Form::close() }}
        
      </div>

    </div>
    </div>
  </div>
  <div class="row">
  <div class="panel panel-default">
  <div class="panel-heading">Lista de Empleados</div>
  <div class="panel-body">
    <p>Lista completa de empleados de DB Digital</p>
  </div>


  <!-- Table -->
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th></th>
        <th>Nombre</th>
        <th>Puesto</th>
        <th>Departamento</th>
        <th>Empresa</th>
        <th>Administradora</th>
        <th>Banco</th>
        <th>Cta Bancaria</th>
        <th>CLABE</th>
        <th>Sueldo</th>
        <th></th>
        <th></th>
      </tr>
    </thead>

    {{Form::open(array('url'=>'eliminar_empleados', 'id'=>'frm_elim_emp'))}}
    @foreach($empleados as $empleado)
      <tr>
      <td></td>
      <td>{{ $empleado->Nombre }} </td>
      <td>{{ $empleado->Puesto }} </td>
      <td>{{ $empleado->Nombre_Depto }}</td>
      <td>{{ $empleado->Nombre_Empresa }}</td>
      <td>{{ $empleado->EmpAdministradora }}</td>
      <td>{{ $empleado->Banco }} </td>
      <td>{{ $empleado->Cta_Bancaria }} </td>
      <td>{{ $empleado->CLABE_Bancaria }} </td>
      <td>{{ $empleado->SueldoBase }} </td>
      <td>
        <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#myModalE" 
        id="{{ $empleado->idEmpleado }}" onClick="reply_click(this.id)">Editar</button>
      </td>
      <td>
        <button class="btn btn-danger btn_elim" type="button" value="{{ $empleado->idEmpleado }}" data-toggle="modal" data-target="#elima_modal" >Eliminar</button>
      </td>
      </tr>
    @endforeach

    <!-- <button class="btn btn-default btn-danger" type="submit" id="btn-elim-b" >Eliminar</button> -->

    {{Form::close()}}
  </table>
</div>

        <?php 
          $empleado = Empleado::find($empleado->idEmpleado);  
        ?>

        <!-- Ventana para editar empleado -->

        <div class="modal fade" id="myModalE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          {{Form::open(array('url'=>'actualizar_empleado'))}}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Editar Empleado</h4> 
              </div>

              <div class="modal-body" style="padding-bottom: 0;">
                <table class="table table-striped">
                  
                <input type="hidden" name="idEmpleado" id="empleado_id" value="">          

                  <tr>
                    <td>{{Form::label('departamento','Departamento')}}</td>
                    <td>

                      <select id="sel_dep" name="emp_idDeparameto_FK">
                        <option value="None">Selecciona Una Opción</option>
                        @foreach($departamentos as $departamento)
                        <option value="{{$departamento->idDepartamento}}">{{$departamento->Nombre_Depto}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td>{{Form::label('empadministradora','Empresa Administradora')}}</td>
                    <td>

                      <select id="sel_empa" name="emp_idEmpAdministradora_FK">
                        <option value="None">Selecciona Una Opción</option>
                        @foreach($empadministradora as $emp)
                        <option value="{{$emp->idEmpAdministradora}}">{{$emp->EmpAdministradora}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td>{{Form::label('empresa','Empresa')}}</td>
                    <td>

                      <select id="sel_emp" name="emp_idEmpresa_FK">
                        <option value="None">Selecciona Una Opción</option>                
                        @foreach($empresas as $empresa)
                        <option value="{{$empresa->idEmpresa}}">{{$empresa->Nombre_Empresa}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>
                 
                  <tr>
                    <td>{{Form::label('nombre','Nombre')}}</td>
                    <td>{{Form::text('Nombre','',array('id'=> 'nombre_in'))}}</td>
                  </tr>

                  <tr>
                    <td>{{Form::label('fechaing','Fecha de Ingreso')}}</td>
                    <td>{{Form::text('Fecha de Ingreso','',array('id'=> 'fechaing'))}}</td>
                  </tr>
                                   
                  <tr>
                    <td>{{Form::label('direccion','Direccion')}}</td>
                    <td>{{Form::text('Direccion','', array('id'=> 'direccion_in'))}}</td>
                  </tr>

                  <tr>
                    <td>{{Form::label('puesto','Puesto')}}</td>
                    <td>{{Form::text('Puesto','', array('id'=> 'puesto_in'))}}</td>
                  </tr>
                  
                  <tr>
                    <td>{{Form::label('telefono','Telefono')}}</td>
                    <td>{{Form::text('Telefono','', array('id'=> 'telefono_in'))}}</td>
                  </tr>
                  
                  <tr>
                    <td>{{Form::label('celular','Celular')}}</td>
                    <td>{{Form::text('Celular','', array('id'=> 'celular_in'))}}</td>
                  </tr>
               
                  <tr>
                    <td>{{Form::label('extension','Extension')}}</td>
                    <td>{{Form::text('Extension','', array('id'=> 'extension_in'))}}</td>
                  </tr>
                                    
                  <tr>
                    <td>{{Form::label('email','Email')}}</td>
                    <td>{{Form::email('Email','', array('id'=> 'email_in'))}}</td>
                  </tr>
               
                  <tr>
                    <td>{{Form::label('banco','Banco')}}</td>
                    <td>{{Form::text('Banco','', array('id'=> 'banco_in'))}}</td>
                  </tr>
               
                  <tr>
                    <td>{{Form::label('cta_bancaria','Cuenta Bancaria')}}</td>
                    <td>{{Form::text('Cta_Bancaria','', array('id'=> 'ctabancaria_in'))}}</td>
                  </tr>
                                                                              
                  <tr>
                    <td>{{Form::label('clabe_bancaria','CLABE Bancaria')}}</td>
                    <td>{{Form::text('CLABE_Bancaria','', array('id'=> 'clabe_in'))}}</td>
                  </tr>
                                                                                                   
                  <tr>
                    <td>{{Form::label('sueldo_base','Sueldo Base')}}</td>
                    <td>{{Form::text('SueldoBase','', array('id'=> 'sueldo_in'))}}</td>
                  </tr>   

                  <tr>
                    <td>{{Form::label('tipo_periodo','Tipo de Periodo')}}</td>
                    <td>

                      <input type="hidden" id="sel_per_v-{{$empleado->idEmpleado}}" value="{{$empleado->emp_idTipoPeriodo_FK}}">

                      <select id="sel_per" name="emp_idTipoPeriodo_FK">
                        <option value="None">Selecciona Una Opción</option>                 
                        @foreach($tipos as $tipo)
                        <option value="{{$tipo->idTipoPeriodo}}">{{$tipo->TipoPeriodo}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>

                </table>                
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </div>
          {{Form::close()}}
        </div>

</div>

</div> 
<!-- /container -->

  </body>
</html>
