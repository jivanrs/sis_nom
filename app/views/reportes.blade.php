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
    <div class="panel panel-default mt20">
      <div class="panel-body">
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
            <label>DESDE:</label>
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
                <li><a href="#">01</a></li>
                <li><a href="#">02</a></li>
                <li><a href="#">03</a></li>
                <li><a href="#">04</a></li>
                <li><a href="#">05</a></li>
                <li><a href="#">06</a></li>
                <li><a href="#">07</a></li>
                <li><a href="#">08</a></li>
                <li><a href="#">09</a></li>
                <li><a href="#">10</a></li>
                <li><a href="#">11</a></li>
                <li><a href="#">12</a></li>
                <li><a href="#">13</a></li>
                <li><a href="#">14</a></li>
                <li><a href="#">15</a></li>
                <li><a href="#">16</a></li>
                <li><a href="#">17</a></li>
                <li><a href="#">18</a></li>
                <li><a href="#">19</a></li>
                <li><a href="#">20</a></li>
                <li><a href="#">21</a></li>
                <li><a href="#">22</a></li>
                <li><a href="#">23</a></li>
                <li><a href="#">24</a></li>
                <li><a href="#">25</a></li>
                <li><a href="#">26</a></li>
                <li><a href="#">27</a></li>
                <li><a href="#">28</a></li>
                <li><a href="#">29</a></li>
                <li><a href="#">30</a></li>
                <li><a href="#">31</a></li>
              </ul>
            </div>

          </div>

          <div class="col-md-4">

            <label>HASTA:</label>
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
    </div>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">Reportes</div>
          <div class="panel-body">

            <!--- Si se elige filtrar por Empleado -->

            @if (isset($empleados))
                
              <!-- Table -->
              <table class="table">
                <tr>
                  <td></td>
                  <td>ID</td>
                  <td>Nombre</td>
                  <td>Tipo de Periodo</td>
                  <td>Empresa</td>
                  <td>Departamento</td>
                  <td>Fecha de Pago</td>
                  <td>Pago</td>
                  <td>Fecha de Nomina</td>
                  <td>Monto</td>
                  <td>Por Pagar</td>
                  <td>Periodo</td>
                  <td>Tipo de Recibo</td>
                </tr>

              <?php 
              $nombre = $empleados[0]->Nombre;
              ?>

              @foreach($empleados as $empleado) 
              
                @if($empleado->Nombre != $nombre)

                  @foreach($total as $t)
                    
                    @if($nombre == $t->Nombre)

                      <tr class="total">
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td class="totalp ">Total Pagado </td>
                        <td class="totalnum">{{$t->Pagado}} </td>
                        <td> </td>
                        <td class="totalr ">Total Restante Por Pagar </td>
                        <td class="totalnum">{{$t->Restante}} </td>
                        <td> </td>
                        <td> </td>
                      </tr>

                    @endif

                  @endforeach

                @endif

                <?php $nombre = $empleado->Nombre ?>

                <tr>
                  <td><input type="checkbox" value="{{$empleado->idEmpleado}}"></td>
                  <td>{{ $empleado->idEmpleado }} </td>
                  <td>{{ $empleado->Nombre }} </td>
                  <td>{{ $empleado->TipoPeriodo }} </td>
                  <td>{{ $empleado->Nombre_Empresa }} </td>
                  <td>{{ $empleado->Nombre_Depto }} </td>
                  <td>{{ $empleado->FechaDePago }} </td>
                  <td>{{ $empleado->Pago }} </td>
                  <td>{{ $empleado->FechaDeRecibo }} </td>
                  <td>{{ $empleado->Monto }} </td>
                  <td>{{ $empleado->PorPagar }} </td>
                  <td>{{ $empleado->Periodo }} </td>
                  <td>{{ $empleado->TipoDeRecibo }} </td>
                </tr>

              @endforeach

              @foreach($total as $t)
                
                @if($nombre == $t->Nombre)

                  <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td class="total ">Total Pagado </td>
                    <td>{{$t->Pagado}} </td>
                    <td> </td>
                    <td class="total ">Total Restante Por Pagar </td>
                    <td>{{$t->Restante}} </td>
                    <td> </td>
                    <td> </td>
                  </tr>

                @endif

              @endforeach

              </table>
                  
              @endif

              <!--- Si se elige filtrar por Empresa -->

              @if (isset($empresas))
                
              <!-- Table -->
              <table class="table">
                <tr>
                  <td>Empresa</td>
                  <td>Departamento</td>
                  <td>Fecha de Pago</td>
                  <td>Pago</td>
                  <td>Fecha de Nomina</td>
                  <td>Monto</td>
                  <td>Por Pagar</td>
                  <td>Periodo</td>
                  <td>Tipo de Recibo</td>
                </tr>

              <?php 
              $nombre_emp = $empresas[0]->Nombre_Empresa;
              ?>

              @foreach($empresas as $empresa) 
              
                @if($empresa->Nombre_Empresa != $nombre_emp)

                  @foreach($total as $t)
                    
                    @if($nombre_emp == $t->Nombre_Depto)

                      <tr>
                        <td> </td>
                        <td> </td>
                        <td class="total ">Total Pagado </td>
                        <td>{{$t->Pagado}} </td>
                        <td class="total ">Total Restante Por Pagar </td>
                        <td>{{$t->Restante}} </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                      </tr>

                    @endif

                  @endforeach

                @endif

                <?php $nombre_emp = $empresa->Nombre_Empresa ?>

                <tr>
                  <td>{{ $empresa->Nombre_Empresa }} </td>
                  <td>{{ $empresa->Nombre_Depto }} </td>
                  <td>{{ $empresa->FechaDePago }} </td>
                  <td>{{ $empresa->Pago }} </td>
                  <td>{{ $empresa->FechaDeRecibo }} </td>
                  <td>{{ $empresa->Monto }} </td>
                  <td>{{ $empresa->PorPagar }} </td>
                  <td>{{ $empresa->Periodo }} </td>
                  <td>{{ $empresa->TipoDeRecibo }} </td>
                </tr>

              @endforeach

              @foreach($total as $t)
                
                @if($nombre_emp == $t->Nombre_Empresa)

                  <tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td class="total ">Total Pagado </td>
                        <td>{{$t->Pagado}} </td>
                        <td class="total ">Total Restante Por Pagar </td>
                        <td>{{$t->Restante}} </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                      </tr>
                  </tr>

                @endif

              @endforeach

              </table>
                  
              @endif

              <!--- Si se elige filtrar por Departamento -->

              @if (isset($departamentos))
                
              <!-- Table -->
              <table class="table">
                <tr>
                  <td>Departamento</td>
                  <td>Empresa</td>
                  <td>Fecha de Pago</td>
                  <td>Pago</td>
                  <td>Fecha de Nomina</td>
                  <td>Monto</td>
                  <td>Por Pagar</td>
                  <td>Periodo</td>
                  <td>Tipo de Recibo</td>
                </tr>

              <?php 
              $nombre_emp = $departamentos[0]->Nombre_Depto;
              ?>

              @foreach($departamentos as $departamento) 
              
                @if($departamento->Nombre_Depto != $nombre_emp)

                  @foreach($total as $t)
                    
                    @if($nombre_emp == $t->Nombre_Depto)

                      <tr>
                        <tr>
                        <td> </td>
                        <td> </td>
                        <td class="total ">Total Pagado </td>
                        <td>{{$t->Pagado}} </td>
                        <td class="total ">Total Restante Por Pagar </td>
                        <td>{{$t->Restante}} </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                      </tr>
                      </tr>

                    @endif

                  @endforeach

                @endif

                <?php $nombre_emp = $departamento->Nombre_Depto ?>

                <tr>
                  <td>{{ $departamento->Nombre_Depto }} </td>
                  <td>{{ $departamento->Nombre_Empresa }} </td>
                  <td>{{ $departamento->FechaDePago }} </td>
                  <td>{{ $departamento->Pago }} </td>
                  <td>{{ $departamento->FechaDeRecibo }} </td>
                  <td>{{ $departamento->Monto }} </td>
                  <td>{{ $departamento->PorPagar }} </td>
                  <td>{{ $departamento->Periodo }} </td>
                  <td>{{ $departamento->TipoDeRecibo }} </td>
                </tr>

              @endforeach

              @foreach($total as $t)
                
                @if($nombre_emp == $t->Nombre_Depto)

                  <tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td class="total ">Total Pagado </td>
                        <td>{{$t->Pagado}} </td>
                        <td class="total ">Total Restante Por Pagar </td>
                        <td>{{$t->Restante}} </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                      </tr>
                  </tr>

                @endif

              @endforeach

              </table>
                  
              @endif


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