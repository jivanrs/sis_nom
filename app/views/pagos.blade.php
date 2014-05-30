<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de nomina Danilo Black</title>
    <link href="css/styles.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
      <table class="table">
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
        @foreach($empleados as $empleado)
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ $empleado->idEmpleado }} </td>
            <td>{{ $empleado->Nombre }} </td>
            <td>{{ $empleado->Puesto }} </td>
            <td>{{ $empleado->Nombre_Depto }} </td>
            <td>{{ $empleado->Nombre_Empresa }} </td>
            <td>{{ $empleado->SueldoBase }} </td>
            <td>{{ $empleado->Restante }} </td>
            <td><button class="btn btn-default" type="button" data-toggle="modal" data-target="#hacerPago">Hacer Pago</button></td>
          </tr>
        @endforeach
        
      </table>
      <div class="col-md-3 col-md-offset-8">
        <button class="btn btn-default" type="button">Filtrar</button>
      </div>
    </div>
    </div>
    <!-- Ventana par agregar un empleado nuevo -->
        <div class="modal fade" id="hacerPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <p>Este es el modal</p>
              </div>
            </div>
          </div>

        </div>
  </div>
</div> 
<!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
