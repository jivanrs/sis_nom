<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de nomina Danilo Black</title>

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/dataTables.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dataTables.js"></script>
    <!-- Bootstrap -->
    
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
      $(document).ready(function(){

        $('#myTable').dataTable();

      });
      function reply_click(clicked_id)
      {

          document.getElementById("dropDownListPP").options.length = 0;
          $('#txtPago').val("");

          $.get('datosPago/'+clicked_id, function(data){

            $('#empleado_id').attr('value',data[0].idEmpleado);
            document.getElementById('empleado_id').innerHTML = data[0].idEmpleado;

            $('#nombre_in').attr('value',data[0].Nombre);
            document.getElementById('nombre_in').innerHTML = data[0].Nombre;

            $('#Nombre_Depto').attr('value',data[0].Nombre_Depto);
            document.getElementById('Nombre_Depto').innerHTML = data[0].Nombre_Depto;

            $('#Nombre_Empresa').attr('value',data[0].Nombre_Empresa);
            document.getElementById('Nombre_Empresa').innerHTML = data[0].Nombre_Empresa;

            $('#sueldo_in').attr('value',data[0].SueldoBase);
            document.getElementById('sueldo_in').innerHTML = data[0].SueldoBase;
            
          });

          $.get('mostrarPorPagar/'+clicked_id, function(data){
            
            var cont = 0 ;

            select = document.getElementById("dropDownListPP");

            var new_options = data;

            /* Insert the new ones from the array above */
            $.each(new_options, function(value) {
                option = document.createElement("option");
                option.value = data[cont].idRecibos;
                option.innerHTML = data[cont].FechaDeRecibo + ' / ' + data[cont].PorPagar;
                select.appendChild(option);
                cont++;
            });
            
          });

      }

      function btnGenNom(){

        $.post('generarNomina', function(data){
          window.location = "pagos";
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
        <div class="col-md-2">
          @if(isset($ultimaFecha))
            <label class="lblFecha">La utlima fecha de Nomina fue: {{$ultimaFecha}}</label>
          @endif
        </div>
        <div class="col-md-2 col-md-offset-7">
          <button class="btn btn-info" type="button" data-toggle="modal" data-target="#gene_modal">Generar Nomina</button>
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
      <div class="panel-heading">Pagos</div>
      <div class="panel-body">
        <p>Lista de empleados para realizar pagos completos o parciales</p>
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
            <th>Sueldo Base</th>
            <th>Sueldo Pendiente</th>
            <th>Realizar Pago</th>
          </tr>
        </thead>
        <?php $contador = 0; ?>

        {{Form::open(array('url'=>'generarNomina'))}}
        <button class="btn btn-default" type="submit" id="btn-gene-b" style="display:none;" >Generar Nomina</button>
        {{Form::close()}}

        @foreach($empleados as $empleado)
          <tr>
            <td></td>
            <td>{{ $empleado->idEmpleado }} </td>
            <td>{{ $empleado->Nombre }} </td>
            <td>{{ $empleado->Puesto }} </td>
            <td>{{ $empleado->Nombre_Depto }} </td>
            <td>{{ $empleado->Nombre_Empresa }} </td>
            <td>{{ $empleado->SueldoBase }} </td>
            <td>{{ $empleado->Restante }} </td>
            <td><button class="btn btn-warning" type="button" data-toggle="modal" data-target="#hacerPago"
              id="{{ $empleado->idEmpleado }}" onClick="reply_click(this.id)">Hacer Pago</button></td>
          </tr>
          <?php $contador++; ?>
        @endforeach

      </table>

    </div>

  </div>


  <!-- Ventana par agregar un empleado nuevo -->
      <div class="modal fade" id="hacerPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="panel-heading title-center"><h3>Realizar Pago a Empleado</h3></div>

              <table class="table table-striped">
                {{Form::open(array('url'=>'realizarPago'))}}

                <tr><td><span class="hacerpago">Empleado: </span> {{ Form::label('nombre', '', array('id' => 'nombre_in')) }} </td></tr>
                <tr><td><span class="hacerpago">Departamento: </span> {{ Form::label('Depto', '', array('id' => 'Nombre_Depto')) }} </td></tr>
                <tr><td><span class="hacerpago">Empresa: </span> {{ Form::label('Empresa', '', array('id' => 'Nombre_Empresa')) }}</td></tr>
                <tr><td><span class="hacerpago">Sueldo mensual: $ </span> {{ Form::label('sueldo', '', array('id' => 'sueldo_in')) }} </td></tr>

                <tr>
                  <td><span class="hacerpago">{{Form::label('sueldo','Realizar Pago')}}</span>
                  <span>{{Form::text('Pago','',array('id' => 'txtPago'))}}</span></td>
                </tr>
                 <tr>
                  <input type="hidden" name="empleado_id" id="empleado_id" value="">
                  <td>
                  </td>
                </tr>
                <tr>
                  <td><span class="hacerpago">Recibo</span>
                    <span>

                    <select name="recibo_id" id="dropDownListPP">
                      <option value="None">Seleccionar Opción</option>
                    </select> 
                    
                    </span>
                  </td>
                  <!--<td><div id="txtHint"><b></b></div></td>-->
                </tr>

                  <td><span class="hacerpago"><button type="submit" class="btn btn-primary">Relizar Pago</button></span></td>
                </tr>
                {{ Form::close() }}
        
            </table>

            </div>
          </div>
        </div>
      </div> <!-- FIN DEL MODAL -->

      <!-- Ventana para confirmar Generar Nomina -->
        <div class="modal fade" id="gene_modal" tabindex="-1" role="dialog" aria-labelledby="myModalNuevo" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Generar Nomina</h4>
              </div>
              <div class="modal-body" style="padding-bottom: 0;">
                La ultima nomina se realizo el <b>{{$ultimaFecha}}</b> <br/> ¿Seguro que quieres correr la nomina?
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" type="submit" value="" onClick="btnGenNom()">Generar Nomina</button>
              </div>
            </div>
          </div>
        </div> 

  </div>
<!-- /container -->

  </body>
</html>
