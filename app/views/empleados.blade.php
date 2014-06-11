
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

      $('#myTable').dataTable();

    });

    function reply_click(clicked_id)
    {
        $.get('empleadoData/'+clicked_id , function(data){

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
          
        });
    }
          /*var departamento       = $('#sel_dep_v').attr('value');
          var empresa            = $('#sel_emp_v').attr('value');
          var tipo_periodo       = $('#sel_per_v').attr('value');
          var empadmin           = $('#sel_empa_v').attr('value');


          $('#sel_dep option[value="'+departamento+'"]').attr("selected", "selected");
          $('#sel_emp option[value="'+empresa+'"]').attr("selected", "selected");
          $('#sel_per option[value="'+tipo_periodo+'"]').attr("selected", "selected");
          $('#sel_empa option[value="'+empadmin+'"]').attr("selected", "selected");*/

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
      <div class="col-md-3 col-md-offset-8">
        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal">Nuevo</button>

        
        <!-- Ventana par agregar un empleado nuevo -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        @foreach($empresas as $empresa)
                        <option value="{{$empresa->idEmpresa}}">{{$empresa->Nombre_Empresa}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>
                 
                  <tr>
                    <td>{{Form::label('nombre','Nombre')}}</td>
                    <td>{{Form::text('Nombre','', array('id'=> 'nombre_in'))}}</td>
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
                    <td>{{Form::label('fechaing','Fecha de Ingreso')}}</td>
                    <td>{{Form::text('Fecha de Ingreso', 'AAAA-MM-DD')}}</td>
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
                      <select name="emp_idTipoPeriodo_FK">                 
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

        <button class="btn btn-default" type="submit" id="btn-elim-a" >Eliminar</button>

      </div>
      
      <div class="col-md-1">
        {{ Form::open(array('url' => 'logout', 'method' => 'get')) }} 
        {{ Form::submit('LogOut', array('class' => 'btn btn-default')) }} 
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
      <th>ID</th>
      <th>Nombre</th>
      <th>Puesto</th>
      <th>Departamento</th>
      <th>Empresa</th>
      <th>Email</th>
      <th>Banco</th>
      <th>Cta Bancaria</th>
      <th>CLABE</th>
      <th>Sueldo</th>
      <th></th>
    </tr>
    </thead>
    <?php $contador = 0; ?>

    {{Form::open(array('url'=>'eliminar_empleados'))}}
    @foreach($empleados as $empleado)
      <tr>
        <td><input type="checkbox" name="empleado[]" id="chk_emp-{{$empleado->idEmpleado}}" value="{{$empleado->idEmpleado}}"></td>
        <td>{{ $empleado->idEmpleado }} </td>
        <td>{{ $empleado->Nombre }} </td>
        <td>{{ $empleado->Puesto }} </td>
        <td>{{ $empleado->Nombre_Depto }}</td>
        <td>{{ $empleado->Nombre_Empresa }}</td>
        <td>{{ $empleado->Email }} </td>
        <td>{{ $empleado->Banco }} </td>
        <td>{{ $empleado->Cta_Bancaria }} </td>
        <td>{{ $empleado->CLABE_Bancaria }} </td>
        <td>{{ $empleado->SueldoBase }} </td>
        <!-- <td><a href="editar_empleado/{{$empleado->idEmpleado}}"><button class="btn btn-default" type="button" id="btn-elim-a">Editar</button></a></td> -->
        <td><button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal" 
          id="{{ $empleado->idEmpleado }}" onClick="reply_click(this.id)">Editar</button></td>
      </tr>
    <?php $contador++; ?>
    @endforeach

    <button class="btn btn-default" type="submit" id="btn-elim-b" style="display:none;" >Eliminar</button>

    {{Form::close()}}
  </table>
</div>

        <?php 
          $empleado = Empleado::find($empleado->idEmpleado);  
        ?>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          {{Form::open(array('url'=>'actualizar_empleado'))}}
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Editar Empleado</h4> 
              </div>

              <div class="modal-body" style="padding-bottom: 0;">
                <table class="table table-striped">
                  
                <input type="hidden" name="idEmpleado" id="empleado_id" value="{{$empleado->idEmpleado}}">          

                  <tr>
                    <td>{{Form::label('departamento','Departamento')}}</td>
                    <td>
                      
                      <input type="hidden" id="sel_dep_v-{{$empleado->idEmpleado}}" value="{{$empleado->emp_idDeparameto_FK}}">

                      <select name="emp_idDeparameto_FK">
                        @foreach($departamentos as $departamento)
                        <option value="{{$departamento->idDepartamento}}">{{$departamento->Nombre_Depto}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td>{{Form::label('empadministradora','Empresa Administradora')}}</td>
                    <td>
                      
                      <input type="hidden" id="sel_empa_v-{{$empleado->idEmpleado}}" value="{{$empleado->emp_idEmpAdministradora_FK}}">

                      <select name="emp_idDeparameto_FK">
                        @foreach($empadministradora as $emp)
                        <option value="{{$departamento->idDepartamento}}">{{$emp->EmpAdministradora}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td>{{Form::label('empresa','Empresa')}}</td>
                    <td>

                      <input type="hidden" id="sel_emp_v-{{$empleado->idEmpleado}}" value="{{$empleado->emp_idEmpresa_FK}}">

                      <select name="emp_idEmpresa_FK">                 
                        @foreach($empresas as $empresa)
                        <option value="{{$empresa->idEmpresa}}">{{$empresa->Nombre_Empresa}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>
                 
                  <tr>
                    <td>{{Form::label('nombre','Nombre')}}</td>
                    <td>{{Form::text('Nombre',$empleado->Nombre)}}</td>
                  </tr>

                  <tr>
                    <td>{{Form::label('fechaing','Fecha de Ingreso')}}</td>
                    <td>{{Form::text('Fecha de Ingreso', $empleado->FechaDeIngreso )}}</td>
                  </tr>
                                   
                  <tr>
                    <td>{{Form::label('direccion','Direccion')}}</td>
                    <td>{{Form::text('Direccion',$empleado->Direccion)}}</td>
                  </tr>

                  <tr>
                    <td>{{Form::label('puesto','Puesto')}}</td>
                    <td>{{Form::text('Puesto',$empleado->Puesto)}}</td>
                  </tr>
                  
                  <tr>
                    <td>{{Form::label('telefono','Telefono')}}</td>
                    <td>{{Form::text('Telefono',$empleado->Telefono)}}</td>
                  </tr>
                  
                  <tr>
                    <td>{{Form::label('celular','Celular')}}</td>
                    <td>{{Form::text('Celular',$empleado->Celular)}}</td>
                  </tr>
               
                  <tr>
                    <td>{{Form::label('extension','Extension')}}</td>
                    <td>{{Form::text('Extension',$empleado->Extension)}}</td>
                  </tr>
                                    
                  <tr>
                    <td>{{Form::label('email','Email')}}</td>
                    <td>{{Form::email('Email',$empleado->Email)}}</td>
                  </tr>
               
                  <tr>
                    <td>{{Form::label('banco','Banco')}}</td>
                    <td>{{Form::text('Banco',$empleado->Banco)}}</td>
                  </tr>
               
                  <tr>
                    <td>{{Form::label('cta_bancaria','Cuenta Bancaria')}}</td>
                    <td>{{Form::text('Cta_Bancaria',$empleado->Cta_Bancaria)}}</td>
                  </tr>
                                                                              
                  <tr>
                    <td>{{Form::label('clabe_bancaria','CLABE Bancaria')}}</td>
                    <td>{{Form::text('CLABE_Bancaria',$empleado->CLABE_Bancaria)}}</td>
                  </tr>
                                                                                                   
                  <tr>
                    <td>{{Form::label('sueldo_base','Sueldo Base')}}</td>
                    <td>{{Form::text('SueldoBase',$empleado->SueldoBase)}}</td>
                  </tr>   

                  <tr>
                    <td>{{Form::label('tipo_periodo','Tipo de Periodo')}}</td>
                    <td>

                      <input type="hidden" id="sel_per_v-{{$empleado->idEmpleado}}" value="{{$empleado->emp_idTipoPeriodo_FK}}">

                      <select name="emp_idTipoPeriodo_FK">                 
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
