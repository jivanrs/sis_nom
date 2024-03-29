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
            <a href="/"><img src="images/logodb.png" /></a>
        </div>
        <div class="logodanilo">
            <a href="/"><img src="images/logo-db.jpg" /></a>
        </div>
    </div>
</div>
<div class="container">
  <form class="form-signin" role="form" action ="login" method="post">
    <h2 class="form-signin-heading">Ingresa tus datos</h2>
    @if (Session::get('flash_message'))
      <div class="flash">
        {{ Session::get('flash_message') }}
      </div>
    @endif
    <input type="user" class="form-control" placeholder="Usuario" required autofocus name="usuario">
    <input type="password" class="form-control" placeholder="Password" required name="password">
    <label class="checkbox">
      <input type="checkbox" value="remember-me" name="chkBox"> Recordarme
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Accesar</button>
  </form>
</div> 
<!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>