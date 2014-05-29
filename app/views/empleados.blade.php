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
            <a href="index.html"><img src="images/logodb.png" /></a>
        </div>
        <div class="logodanilo">
            <a href="index.html"><img src="images/logo-db.jpg" /></a>
        </div>
    </div>
</div>
<div class="container">
  <div class="row">
    <div class="panel panel-default mt20">
    <div class="panel-heading">
      <div class="col-md-3 col-md-offset-8">
        <button class="btn btn-default" type="button">Nuevo</button>
        <button class="btn btn-default" type="button">Editar</button>
        <button class="btn btn-default" type="button">Eliminar</button>
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
  <table class="table">
    <tr>
      <td></td>
      <td>ID</td>
      <td>Nombre</td>
      <td>Puesto</td>
      <td>Departamento</td>
      <td>Empresa</td>
      <td>Email</td>
      <td>Banco</td>
      <td>Cta Bancaria</td>
      <td>CLABE</td>
      <td>Sueldo</td>
    </tr>
    @foreach($empleados as $empleado)
      <tr>
        <td><input type="checkbox"></td>
        <td>{{ $empleado->idEmpleado }} </td>
        <td>{{ $empleado->Nombre }} </td>
        <td>{{ $empleado->Puesto }} </td>
        <td>{{ $empleado->Nombre_Depto }} </td>
        <td>{{ $empleado->Nombre_Empresa }} </td>
        <td>{{ $empleado->Email }} </td>
        <td>{{ $empleado->Banco }} </td>
        <td>{{ $empleado->Cta_Bancaria }} </td>
        <td>{{ $empleado->CLABE_Bancaria }} </td>
        <td>{{ $empleado->SueldoBase }} </td>
      </tr>
    @endforeach
  </table>
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
