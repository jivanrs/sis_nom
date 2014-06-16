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
        <h3>Menú Principal</h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="row">
        <div class="col-md-6">
          <div class="btn-menu">
            <a href="{{ URL::to('empleados') }}">
              <span class="glyphicon glyphicon-user"></span>
              <span class="glyphicon-class">Lista de Empleados</span>
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="btn-menu">
            <a href="{{ URL::to('pagos') }}">
              <span class="glyphicon glyphicon-usd"></span>
              <span class="glyphicon-class">Realizar Pago</span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="btn-menu">
            <a href="{{ URL::to('bonos') }}">
              <span class="glyphicon glyphicon-usd"></span>
              <span class="glyphicon-class">Realizar Bono</span>
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="btn-menu">
            <a href="{{ URL::to('reportes') }}">
              <span class="glyphicon glyphicon-sort-by-attributes"></span>
              <span class="glyphicon-class">Realizar Reporte</span>
            </a>
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