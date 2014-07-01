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
    <link href="css/dataTables.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/mask.js"></script>
    <script src="js/dataTables.js"></script>
    <script src="js/datepicker.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    $(document).ready(function(){
      $('#fechaIni').datepicker();
      $('#fechaFin').datepicker();
      $('#myTable').dataTable();
    
     /* $('#btn_reporte').click(function(e){  
          e.preventDefault();
          var usuario = 2;
          var tipo_reporte  = $( "#tipoReporte option:selected" ).text();
          var fecha_inicio  = $( "#fechaIni").attr('value');
          var fecha_fin     = $( "#fechaFin").attr('value');

          if (tipo_reporte == 'Empleado') {
            $.post('reportes_empleados_aj', {user_id: '2', fecha_inicio: fecha_inicio, fecha_fin: fecha_fin} ,function(data){
            });   
          }

          if (tipo_reporte == 'Departamento') {
            alert('hola, edmundo');
          }

          if (tipo_reporte == 'Emoresa') {
            alert('hola, edmundo');
          }

      });*/ //Click

    }); //Document ready
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
            {{Form::open(array('url'=>'reportes'))}}
            <a href="reportes?"></a>
            <div class="btn-group">
              <select name="tipo_Reporte" id="tipoReporte" class="form-control">
                <option value="Empleado">Empleado</option>
                <option value="Departamento">Departamento</option>
                <option value="Empresa">Empresa</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="col-md-3">
              <label>DESDE:</label>
            </div>
            <div class="col-md-7">
              <input name="fechaIni" type="text" id="fechaIni" data-date-format="mm/dd/yy" value="06/16/14" class="span2">
            </div>
          </div>
          <div class="col-md-4">
            <div class="col-md-3">
              <label>HASTA:</label>
            </div>
            <div class="col-md-7">
              <input name="fechaFin" type="text" id="fechaFin" data-date-format="mm/dd/yy" value="06/16/14" class="span2">
            </div>
          </div>

          <div class="col-md-1">
          <button class="btn btn-danger" id="btn_reporte" type="submit" value="">Filtrar</button>
          </div>
          {{ Form::close() }}
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
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Departamento</th>
                    <th>Fecha de Pago</th>
                    <th>Pago</th>
                    <th>Comision</th>
                    <th>IVA</th>
                    <th>Total</th>
                    <th>Mes del Periodo</th>
                    <th>Periodo</th>
                    <th>Monto</th>
                    <th>Por Pagar</th>
                    <th>Tipo de Recibo</th>
                  </tr>
                </thead>

              <?php 
              $nombre = $empleados[0]->Nombre;
              ?>

              @foreach($empleados as $empleado) 
              
                @if($empleado->Nombre != $nombre)

                  @foreach($total as $t)
                    
                    @if($nombre == $t->Nombre)

                      <tr class="total">
                        <td></td>
                        <td><label hidden="true" value="<?php echo $nombre ?>"><?php echo $nombre ?></label></td>
                        <td> </td>
                        <td> </td>
                        <td class="totalp">Total Pagado </td>
                        <td class="totalnum"> $<?php echo number_format($t->Pagado, 2) ?> </td>
                        <td class="totalnum"> $<?php echo number_format($t->ComisionPT, 2) ?> </td>
                        <td class="totalnum"> $<?php echo number_format($t->IVA, 2) ?> </td>
                        <td class="totalp"> $<?php echo number_format($t->Pagado + $t->ComisionPT + $t->IVA, 2) ?></td>
                        <td> </td>
                        <td> </td>
                        <td class="totalr ">Total Restante Por Pagar </td>
                        <td class="totalnum"> $<?php echo number_format($t->Restante, 2) ?></td>
                        <td> </td>
                      </tr>
                      <tr>
                        <td class="space"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                    @endif

                  @endforeach

                @endif

                <?php $nombre = $empleado->Nombre ?>

                <tr>
                  <td></td>
                  <td>{{ $empleado->Nombre }} </td>
                  <td>{{ $empleado->Nombre_Empresa }} </td>
                  <td>{{ $empleado->Nombre_Depto }} </td>
                  <td>{{ $empleado->FechaDePago }} </td>
                  <td class="pago"> $<?php echo number_format($empleado->Pago , 2 ) ?></td>
                  <td class="comision"> $<?php echo number_format($empleado->ComisionP , 2 ) ?></td>
                  <td class="iva"> $<?php echo number_format($empleado->IVA  , 2 ) ?> </td>
                  <td class="comision"> $<?php echo number_format($empleado->Pago + $empleado->ComisionP + $empleado->IVA , 2 ) ?> </td>
                  <td>{{ $empleado->FechaDeRecibo }} </td>
                  <td>{{ $empleado->Periodo }} </td>
                  <td class="monto"> $<?php echo number_format($empleado->Monto, 2 ) ?> </td>
                  <td class="porpagar"> $<?php echo number_format($empleado->PorPagar , 2 ) ?>  </td>
                  <td><?php 
                    if($empleado->TipoDeRecibo == 0){
                      echo "Nómina";
                    }
                    else{
                      echo "Bono";
                    }
                  ?></td>
                </tr>

              @endforeach

              @foreach($total as $t)
                
                @if($nombre == $t->Nombre)

                  <tr class="total">
                    <td></td>
                    <td><label hidden="true" value="<?php echo $nombre ?>"><?php echo $nombre ?></label></td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td class="totalp">Total Pagado </td>
                    <td class="totalnum"> $<?php echo number_format($t->Pagado, 2) ?> </td>
                    <td class="totalnum"> $<?php echo number_format($t->ComisionPT, 2) ?> </td>
                    <td class="totalnum"> $<?php echo number_format($t->IVA, 2) ?> </td>
                    <td class="totalp"> $<?php echo number_format($t->Pagado + $t->ComisionPT + $t->IVA, 2) ?></td>
                    <td> </td>
                    <td> </td>
                    <td class="totalr ">Total Restante Por Pagar </td>
                    <td class="totalnum"> $<?php echo number_format($t->Restante, 2) ?></td>
                    <td> </td>
                  </tr>
                  <tr>
                    <td class="space"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>

                @endif

              @endforeach

              </table>
                  
              @endif

              <!--- Si se elige filtrar por Empresa -->

              @if (isset($empresas))
                
              <!-- Table -->
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th></th>
                    <th>Empresa</th>
                    <th>Departamento</th>
                    <th>Fecha de Pago</th>
                    <th>Pago</th>
                    <th>Comision</th>
                    <th>IVA</th>
                    <th>Total</th>
                    <th>Mes del Período</th>
                    <th>Periodo</th>
                    <th>Monto</th>
                    <th>Por Pagar</th>
                    <th>Tipo de Recibo</th>
                  </tr>
                </thead>

              <?php 
              $nombre_emp = $empresas[0]->Nombre_Empresa;
              ?>

              @foreach($empresas as $empresa) 
              
                @if($empresa->Nombre_Empresa != $nombre_emp)

                  @foreach($total as $t)
                    
                    @if($nombre_emp == $t->Nombre_Empresa)

                      <tr class="total">
                        <td> </td>
                        <td><label hidden="true" value="<?php echo $nombre_emp ?>"><?php echo $nombre_emp ?></label></td>
                        <td></td>
                        <td class="totalp ">Total Pagado </td>
                        <td class="totalnum"> $<?php echo number_format($t->Pagado, 2) ?> </td>
                        <td> $<?php echo number_format($t->ComisionPT, 2) ?> </td>
                        <td> $<?php echo number_format($t->IVA, 2) ?> </td>
                        <td> $<?php echo number_format($t->Pagado + $t->ComisionPT + $t->IVA, 2) ?></td>
                        <td> </td>
                        <td class="totalr ">Total Restante Por Pagar </td>
                        <td class="totalnum"> $<?php echo number_format($t->Restante, 2) ?></td>
                        <td> </td>
                        <td> </td>
                      </tr>

                    @endif

                  @endforeach

                @endif

                <?php $nombre_emp = $empresa->Nombre_Empresa ?>

                <tr>
                  <td></td>
                  <td>{{ $empresa->Nombre_Empresa }} </td>
                  <td>{{ $empresa->Nombre_Depto }} </td>
                  <td>{{ $empresa->FechaDePago }} </td>
                  <td class="pago"> $<?php echo number_format($empresa->Pago , 2 ) ?></td>
                  <td class="comision"> $<?php echo number_format($empresa->ComisionP , 2 ) ?></td>
                  <td class="iva"> $<?php echo number_format($empresa->IVA  , 2 ) ?> </td>
                  <td > $<?php echo number_format($empresa->Pago + $empresa->ComisionP + $empresa->IVA , 2 ) ?> </td>
                  <td>{{ $empresa->FechaDeRecibo }} </td>
                  <td class="monto"> $<?php echo number_format($empresa->Monto, 2 ) ?> </td>
                  <td class="porpagar"> $<?php echo number_format($empresa->PorPagar , 2 ) ?>  </td>
                  <td>{{ $empresa->Periodo }} </td>
                  <td><?php 
                    if($empresa->TipoDeRecibo == 0){
                      echo "Nómina";
                    }
                    else{
                      echo "Bono";
                    }
                  ?></td>
                </tr>

              @endforeach

              @foreach($total as $t)
                
                @if($nombre_emp == $t->Nombre_Empresa)

                  <tr class="total">
                        <td> </td>
                        <td><label hidden="true" value="<?php echo $nombre_emp ?>"><?php echo $nombre_emp ?></label></td>
                        <td></td>
                        <td class="totalp ">Total Pagado </td>
                        <td class="totalnum"> $<?php echo number_format($t->Pagado, 2) ?> </td>
                        <td> $<?php echo number_format($t->ComisionPT, 2) ?> </td>
                        <td> $<?php echo number_format($t->IVA, 2) ?> </td>
                        <td> $<?php echo number_format($t->Pagado + $t->ComisionPT + $t->IVA, 2) ?></td>
                        <td> </td>
                        <td class="totalr ">Total Restante Por Pagar </td>
                        <td class="totalnum"> $<?php echo number_format($t->Restante, 2) ?></td>
                        <td> </td>
                        <td> </td>
                      </tr>

                @endif

              @endforeach

              </table>
                  
              @endif

              <!--- Si se elige filtrar por Departamento -->

              @if (isset($departamentos))
                
              <!-- Table -->
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th></th>
                    <th>Departamento</th>
                    <th>Empresa</th>
                    <th>Fecha de Pago</th>
                    <th>Pago</th>
                    <th>Comision</th>
                    <th>IVA</th>
                    <th>Total</th>
                    <th>Mes del Período</th>
                    <th>Periodo</th>
                    <th>Monto</th>
                    <th>Por Pagar</th>
                    <th>Tipo de Recibo</th>
                  </tr>
                </thead>

              <?php 
              $nombre_dep = $departamentos[0]->Nombre_Depto;
              ?>

              @foreach($departamentos as $departamento) 
              
                @if($departamento->Nombre_Depto != $nombre_dep)

                  @foreach($total as $t)
                    
                    @if($nombre_dep == $t->Nombre_Depto)

                       <tr class="total">
                        <td> </td>
                        <td></td>
                        <td><label hidden="true" value="<?php echo $nombre_dep ?>"><?php echo $nombre_dep ?></label></td>
                        <td class="totalp ">Total Pagado </td>
                        <td class="totalnum"> $<?php echo number_format($t->Pagado, 2) ?> </td>
                        <td> $<?php echo number_format($t->ComisionPT, 2) ?> </td>
                        <td> $<?php echo number_format($t->IVA, 2) ?> </td>
                        <td> $<?php echo number_format($t->Pagado + $t->ComisionPT + $t->IVA, 2) ?></td>
                        <td> </td>
                        <td class="totalr ">Total Restante Por Pagar </td>
                        <td class="totalnum"> $<?php echo number_format($t->Restante, 2) ?></td>
                        <td> </td>
                        <td> </td>
                      </tr>

                    @endif

                  @endforeach

                @endif

                <?php $nombre_dep = $departamento->Nombre_Depto ?>

                <tr>
                  <td></td>
                  <td>{{ $departamento->Nombre_Depto }} </td>
                  <td>{{ $departamento->Nombre_Empresa }} </td>
                  <td>{{ $departamento->FechaDePago }} </td>
                  <td class="pago"> $<?php echo number_format($departamento->Pago , 2 ) ?></td>
                  <td class="comision"> $<?php echo number_format($departamento->ComisionP , 2 ) ?></td>
                  <td class="iva"> $<?php echo number_format($departamento->IVA  , 2 ) ?> </td>
                  <td > $<?php echo number_format($departamento->Pago + $departamento->ComisionP + $departamento->IVA , 2 ) ?> </td>
                  <td>{{ $departamento->FechaDeRecibo }} </td>
                  <td class="monto"> $<?php echo number_format($departamento->Monto, 2 ) ?> </td>
                  <td class="porpagar"> $<?php echo number_format($departamento->PorPagar , 2 ) ?>  </td>
                  <td>{{ $departamento->Periodo }} </td>
                  <td><?php 
                    if($departamento->TipoDeRecibo == 0){
                      echo "Nómina";
                    }
                    else{
                      echo "Bono";
                    }
                  ?></td>
                </tr>

              @endforeach

              @foreach($total as $t)
                
                @if($nombre_dep == $t->Nombre_Depto)

                  <tr class="total">
                        <td> </td>
                        <td></td>
                        <td><label hidden="true" value="<?php echo $nombre_dep ?>"><?php echo $nombre_dep ?></label></td>
                        <td class="totalp ">Total Pagado </td>
                        <td class="totalnum"> $<?php echo number_format($t->Pagado, 2) ?> </td>
                        <td> $<?php echo number_format($t->ComisionPT, 2) ?> </td>
                        <td> $<?php echo number_format($t->IVA, 2) ?> </td>
                        <td> $<?php echo number_format($t->Pagado + $t->ComisionPT + $t->IVA, 2) ?></td>
                        <td> </td>
                        <td class="totalr ">Total Restante Por Pagar </td>
                        <td class="totalnum"> $<?php echo number_format($t->Restante, 2) ?></td>
                        <td> </td>
                        <td> </td>
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
    

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>