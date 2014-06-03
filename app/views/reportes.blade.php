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
      <div class="panel-heading title-center">
        <h3>Sistema de Reportes</h3>
      </div>
    </div>
  </div>
  <div class="row">
    <form>
      <div class="col-md-12">
        <div class="col-md-3">
          <label>FILTRAR POR:</label>
          <div class="btn-group">
            <button class="btn btn-default" type="button">Default</button>
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
              <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Empleados</a></li>
              <li><a href="#">Departamento</a></li>
              <li><a href="#">Empresa</a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-4">
          <label>FILTRAR DESDE:</label>
          <div class="btn-group">
            <button class="btn btn-default" type="button">Año</button>
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
              <span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">2012</a></li>
              <li><a href="#">2013</a></li>
              <li><a href="#">2014</a></li>
            </ul>
          </div>

          <div class="btn-group">
            <button class="btn btn-default" type="button">Mes</button>
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
              <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Enero</a></li>
              <li><a href="#">Febrero</a></li>
              <li><a href="#">Marzo</a></li>
              <li><a href="#">Abril</a></li>
              <li><a href="#">Mayo</a></li>
              <li><a href="#">Junio</a></li>
              <li><a href="#">Julio</a></li>
              <li><a href="#">Agosto</a></li>
              <li><a href="#">Septiembre</a></li>
              <li><a href="#">Octubre</a></li>
              <li><a href="#">Noviembre</a></li>
              <li><a href="#">Diciembre</a></li>
            </ul>
          </div>

          <div class="btn-group">
            <button class="btn btn-default" type="button">Día</button>
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
              <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Lunes</a></li>
              <li><a href="#">Martes</a></li>
              <li><a href="#">Miercoles</a></li>
              <li><a href="#">Jueves</a></li>
              <li><a href="#">Viernes</a></li>
              <li><a href="#">Sabado</a></li>
              <li><a href="#">Domingo</a></li>
            </ul>
          </div>

        </div>

        <div class="col-md-4">

          <label>FILTRAR HASTA:</label>
          <div class="btn-group">
            <button class="btn btn-default" type="button">Año</button>
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
              <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">2012</a></li>
              <li><a href="#">2013</a></li>
              <li><a href="#">2014</a></li>
            </ul>
          </div>

          <div class="btn-group">
            <button class="btn btn-default" type="button">Mes</button>
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
              <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Enero</a></li>
              <li><a href="#">Febrero</a></li>
              <li><a href="#">Marzo</a></li>
              <li><a href="#">Abril</a></li>
              <li><a href="#">Mayo</a></li>
              <li><a href="#">Junio</a></li>
              <li><a href="#">Julio</a></li>
              <li><a href="#">Agosto</a></li>
              <li><a href="#">Septiembre</a></li>
              <li><a href="#">Octubre</a></li>
              <li><a href="#">Noviembre</a></li>
              <li><a href="#">Diciembre</a></li>
            </ul>
          </div>

          <div class="btn-group">
            <button class="btn btn-default" type="button">Día</button>
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
              <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Lunes</a></li>
              <li><a href="#">Martes</a></li>
              <li><a href="#">Miercoles</a></li>
              <li><a href="#">Jueves</a></li>
              <li><a href="#">Viernes</a></li>
              <li><a href="#">Sabado</a></li>
              <li><a href="#">Domingo</a></li>
            </ul>
          </div>

        </div>

        <div class="col-md-1">
        <button type="input" class="btn btn-primary">Enviar</button>
        </div>

      </div>
    </form>
  </div>
</div>
<!-- /container -->

<!-- Table -->
  <table class="table">
    <tr>
      <td></td>
      <td>Nombre</td>
      <td>Empresa</td>
      <td>Departamento</td>
      <td>Fecha de Pago</td>
      <td>Pago</td>
      <td>Fecha de Recibo</td>
      <td>Periodo</td>
    </tr>
    <?php $contador = 0; ?>

    {{Form::open(array('url'=>'eliminar_empleados'))}}
    @foreach($empleados as $empleado)
      <tr>
        <td><input type="checkbox" name="empleado[]" id="chk_emp-{{$empleado->idEmpleado}}" value="{{$empleado->idEmpleado}}"></td>
        <td>{{ $empleado->Nombre }} </td>
        <td>{{ $empleado->Nombre_Empresa }}</td>
        <td>{{ $empleado->Nombre_Depto }}</td>
        <td>{{ $empleado->FechaDePago }} </td>
        <td>{{ $empleado->Pago }} </td>
        <td>{{ $empleado->FechaDeRecibo }} </td>
        <td>{{ $empleado->Periodo }} </td>
        <td><button class="btn btn-default" type="button" id="btn-elim-a">Editar</button></td>
      </tr>
    <?php $contador++; ?>
    @endforeach

    <button class="btn btn-default" type="submit" id="btn-elim-b" style="display:none;" >Eliminar</button>

    {{Form::close()}}
  </table>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>