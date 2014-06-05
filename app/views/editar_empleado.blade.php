
<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
  <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
  <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de nomina Danilo Black</title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  
  <script>
    $(document).ready(function(){
        var departamento       = $('#sel_dep_v').attr('value');
        var empresa            = $('#sel_emp_v').attr('value');
        var tipo_periodo       = $('#sel_per_v').attr('value');

        $('#sel_dep option[value="'+departamento+'"]').attr("selected", "selected");
        $('#sel_emp option[value="'+empresa+'"]').attr("selected", "selected");
        $('#sel_per option[value="'+tipo_periodo+'"]').attr("selected", "selected");
  });

  </script>

  </head>
  <body>
    <!--Header-->
<div class="header">
  <div class="content-header">
        <div class="logodb">
            <a href="{{ URL::to('/') }}"><img src="{{ URL::asset('images/logodb.png') }}" /></a>
        </div>
        <div class="logodanilo">
            <a href="{{ URL::to('/') }}"><img src="{{ URL::asset('images/logo-db.jpg') }}" /></a>
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
  <div class="panel-heading">Editar empleado</div>
  <div class="panel-body">
    <!-- <p>Lista completa de empleados de DB Digital</p> -->
  </div>

  <!-- Datos necesario -->

  <?php $departamentos = Departamento::all(); ?>
  <?php $empresas = Empresa::all(); ?>
  <?php $tipos = TipoPeriodo::all(); ?>  

  
  {{Form::open(array('url'=>'actualizar_empleado'))}}
  <!-- Table -->
  <table class="table">

      <input type="hidden" name="idEmpleado" id="empleado_id" value="{{$empleado->idEmpleado}}">
      
      <tr>
        <td>{{Form::label('departamento','Departamento')}}</td>
        <td>
          
          <input type="hidden" id="sel_dep_v" value="{{$empleado->emp_idDeparameto_FK}}">

          <select id="sel_dep" name="emp_idDeparameto_FK">
            @foreach($departamentos as $departamento)
            <option value="{{$departamento->idDepartamento}}">{{$departamento->Nombre_Depto}}</option>
            @endforeach
          </select>
        </td>
      </tr>

      <tr>
        <td>{{Form::label('empresa','Empresa')}}</td>
        <td>                   
          
          <input type="hidden" id="sel_emp_v" value="{{$empleado->emp_idEmpresa_FK}}">

          <select id="sel_emp" name="emp_idEmpresa_FK">                 
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
          
          <input type="hidden" id="sel_per_v" value="{{$empleado->emp_idTipoPeriodo_FK}}">

          <select id="sel_per" name="emp_idTipoPeriodo_FK">                 
            @foreach($tipos as $tipo)
            <option value="{{$tipo->idTipoPeriodo}}">{{$tipo->TipoPeriodo}}</option>
            @endforeach
          </select>
        </td>
      </tr>

      <!-- $empleado-> -->

  </table>
  

</div>

  <button class="btn btn-default" type="submit" id="btn-elim-b">Guardar</button>
  
  {{Form::close()}}  

  <br />
  <br />

</div>

</div> 
<!-- /container -->

  </body>
</html>
