<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de nomina Danilo Black</title>
    <link href="css/styles.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
      $(document).ready(function(){
        
        $('#btn-gene-a').click(function(){
          $('#btn-gene-b').click();
        });
      });
    
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
          <button class="btn btn-default" type="submit" id="btn-gene-a" >Generar Nomina</button>
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
      <div class="panel-heading">Pagos</div>
      <div class="panel-body">
        <p>Lista de empleados para realizar pagos completos o parciales</p>
      </div>

      <!-- Table -->
      <table class="table table-striped">
        <tr>
          <td></td>
          <td>ID</td>
          <td>Nombre</td>
          <td>Puesto</td>
          <td>Departamento</td>
          <td>Empresa</td>
          <td>Sueldo Base</td>
          <td>Sueldo Pendiente</td>
          <td>Realizar Pago</td>
        </tr>

        <?php $contador = 0; ?>

        {{Form::open(array('url'=>'generarNomina'))}}
        @foreach($empleados as $empleado)
          <tr>
            <td><input type="checkbox" name="empleados[]" id="chk_emp-{{$empleado->idEmpleado}}" value="{{$empleado->idEmpleado}}"></td>
            <td>{{ $empleado->idEmpleado }} </td>
            <td>{{ $empleado->Nombre }} </td>
            <td>{{ $empleado->Puesto }} </td>
            <td>{{ $empleado->Nombre_Depto }} </td>
            <td>{{ $empleado->Nombre_Empresa }} </td>
            <td>{{ $empleado->SueldoBase }} </td>

            <td>{{ $empleado->Restante }} </td>

            <td><button class="btn btn-default" type="button" data-toggle="modal" data-target="#hacerPago-{{$empleado->idEmpleado}}">Hacer Pago</button></td>
          </tr>
          <?php $contador++; ?>
        @endforeach

        <button class="btn btn-default" type="submit" id="btn-gene-b" style="display:none;" >Generar Nomina</button>
        {{Form::close()}}

      </table>
    </div>
  </div>

  @foreach($empleados as $empleado)
  <!-- Ventana par agregar un empleado nuevo -->
      <div class="modal fade" id="hacerPago-{{$empleado->idEmpleado}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="panel-heading title-center"><h3>Realizar Pago a Empleado</h3></div>
              <table class="table table-striped">
                {{Form::open(array('url'=>'realizarPago'))}}

                <tr><td><span class="hacerpago">Empleado: </span>{{ $empleado->Nombre }} </td></tr>
                <tr><td><span class="hacerpago">Departamento: </span>{{ $empleado->Nombre_Depto }} </td></tr>
                <tr><td><span class="hacerpago">Empresa: </span>{{ $empleado->Nombre_Empresa }} </td></tr>
                <tr><td><span class="hacerpago">Sueldo mensual: $ </span>{{ $empleado->SueldoBase }} </td></tr>

                <tr>
                  <td><span class="hacerpago">{{Form::label('sueldo','Realizar Pago')}}</span>
                  <span>{{Form::text('Pago','')}}</span></td>
                </tr>
                 <tr>
                  <input type="hidden" name="empleado_id" value="{{ $empleado->idEmpleado }}">
                  <td>
                    <select name="tipo_pago" style="margin-left: 35px;">
                      <option value="0">Regular</option>
                      <option value="1">Bono especial</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td><span class="hacerpago">Recibo</span>
                    <span>
                    <?php 
                        $recibos = Recibos::where('rec_idEmpleado_FK',$empleado->idEmpleado)
                        ->where('PorPagar', '!=', ' 0')->where('TipoDeRecibo', '=', '0')->get();
                     ?>
                    <select id="recFecha" name="recibo_id">
                      @foreach($recibos as $r)
                        <option value="{{$r->idRecibos}}">{{$r->FechaDeRecibo}} / {{$r->PorPagar}}</option>
                      @endforeach
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
      @endforeach

  </div>
<!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
      $('#recFecha').unbind('change').bind('change',function() {
      
         $.ajax({
                type:"GET",
                url : "{{URL::to('mostrarPorPagar')}}",
                data : { id: $(this).val() },
                async: false,
                success : function(response) {
                    document.getElementById("txtHint").innerHTML=response;
                },
                error: function() {
                    //alert('MAL'); 
                }
            });
               
        });
    </script>
  </body>
</html>
