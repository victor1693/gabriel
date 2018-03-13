<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registro</title>
  <?php include('local/resources/views/includes/referencias_top.html');?>
   <link href="local/resources/views/plugins/select2/select2.css" rel="stylesheet" />
</head>
<body class="hold-transition register-page" style="background-image: url('https://www.ibm.com/blogs/business-analytics/wp-content/uploads/2017/02/data-analytics-too-much-data.jpg');">
<div class="register-box">
  <div class="register-logo">
    <a href="iniciar"><b>Opinion</b>App</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Complete la información solicitada.</p>

    <form action="registro" method="post" id="formulario">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group has-feedback">
        <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
        <input name="clave1" id="clave1" type="password" class="form-control" placeholder="Clave">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="clave2" id="clave2" type="password" class="form-control" placeholder="Repita su clave">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="correo" id="correo" type="email" class="form-control" placeholder="Correo">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
     
      <div class="form-group has-feedback">
       
      
        <select id="pais" name="pais" class="form-control select2" style="padding-bottom: 10px;">
          <option value="" >País</option>
          <?php 
            foreach ($datos as $key ) {
             echo "<option value='".$key->iso."''>".$key->nombrePais."</option>";
            }
          ?>
        </select> 
      </div>
       <div class="form-group has-feedback">
        <input name="fecha" id="fecha" type="date" class="form-control" placeholder="Fecha de nacimiento"  >
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>
     <div  class="form-group has-feedback">
        <select name="sexo" id="sexo" class="form-control" s>
          <option value="">Sexo</option>
          <option value="F">Femenino</option>
          <option value="M">Masculino</option>
        </select> 
      </div>
      <div class="row">         
       <div class="col-xs-12" style="padding-top: 0px;"> 
          <input name="politicas" type="checkbox" class="form-check-input" id="politicas" style="margin-top: -30px;margin-bottom: 15px;">
          <span style="margin-top: -10px;">Acepto las <a href="http://www.opinion-app.com/politicadeprivacidad.pdf" target="_blank">politicas de opinionApp</a></span> 
       </div>
        <div class="col-xs-12 text-center">
          <a onClick="validar_formulario()" class="btn btn-primary btn-block btn-flat">Registrar</a>
        </div>
        <div class="col-xs-12" style="padding-top: 10px;">    
          <a  href="iniciar" class="" style="margin-top: 15px;">Iniciar sesión</a>
        </div>
        <!-- /.col -->
      </div>
    </form> 
  </div>
  <!-- /.form-box -->
  <div id="ohsnap"></div> 
</div>
<!-- /.register-box -->

<!-- jQuery 3.1.1 -->
<?php include('local/resources/views/includes/referencias_down.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 <script type="text/javascript"> 
 
 $(".select2").select2();

 function validar_formulario()
 {
    if($("#nombre").val()==""){ohSnap('Debe colocar su nombre de usuario.', {color: 'orange '});$('#nombre').focus();}
    else if($("#clave1").val()==""){ohSnap('Debe colocar su clave.', {color: 'orange '});$('#clave1').focus();}
    else if($("#clave1").val().length < 7){ohSnap('La clave debe ser mayor o igual a 6 caracteres.', {color: 'orange '});$('#clave1').focus();}
    else if($("#clave2").val()==""){ohSnap('Repita su clave nuevamente.', {color: 'orange '});$('#clave2').focus();}    
    else if($("#clave2").val()!=$("#clave1").val())
    {
    ohSnap('Las claves deben ser iguales.', {color: 'orange '});$('#clave1').focus();
    }
    else if($("#correo").val()==""){ohSnap('Debe colocar su correo.', {color: 'orange '});$('#correo').focus();}
    else if($("#pais").val()==""){ohSnap('Debe seleccionar un país.', {color: 'orange '});$('#pais').focus();}
    else if($("#fecha").val()==""){ohSnap('Debe seleccionar una fecha.', {color: 'orange '});$('#fecha').focus();}
    else if($("#sexo").val()==""){ohSnap('Debe indicar su sexo.', {color: 'orange '});$('#sexo').focus();}
    else if(!$("#politicas").is(':checked')){ohSnap('Debe aceptar las politicas.', {color: 'orange '});}
    else{$("#formulario").submit();}
 } 
 </script>
 <?php
 if(isset($_GET["info"]))
  {
    if($_GET["info"]=="nombre") echo "<script>ohSnap('Debe colorcar su nombre de usuario.', {color: 'orange '});$('#nombre').focus();</script>";
    else if($_GET["info"]=="correo") echo "<script>ohSnap('Debe colocar su correo.', {color: 'orange '});$('#correo').focus();</script>";
    else if($_GET["info"]=="pais") echo "<script>ohSnap('Debe seleccionar un pais', {color: 'red'});$('#pais').focus();</script>";
    else if($_GET["info"]=="clave1") echo "<script>ohSnap('Debe colocar una clave.', {color: 'red'});$('#clave1').focus();</script>";
    else if($_GET["info"]=="max") 
    {
      echo "<script>ohSnap('La clave debe ser mayor o igual a 6 caracteres.', {color: 'red'});$('#clave1').focus();</script>";
    }
    else if($_GET["info"]=="clave2") echo "<script>ohSnap('Debe repetir su clave.', {color: 'red'});$('#clave2').focus();</script>";
    else if($_GET["info"]=="claves") echo "<script>ohSnap('Las claves deben ser iguales', {color: 'red'});$('#clave1').focus();</script>";
    else if($_GET["info"]=="sexo") echo "<script>ohSnap('Debe indicar un sexo', {color: 'red'});$('#sexo').focus();</script>";
    else if($_GET["info"]=="fecha") echo "<script>ohSnap('Debe indicar un sexo', {color: 'red'});$('#fecha').focus();</script>";
    else if($_GET["info"]=="politicas") echo "<script>ohSnap('Debe aceptar las politicas', {color: 'red'});$('#politicas').focus();</script>";
     else if($_GET["info"]=="true") {echo '<script>swal("Atención!", "Se ha enviado un correo para la activación de su cuenta.", "info");
     </script>';}

  }
   if(isset($_GET["validate"]))
  {
    if($_GET["validate"]=="correo")
    {
      echo '<script>swal("Atención!", "Este correo ya esta siendo usado en otra cuenta.", "error");
     </script>';
    }
    else if($_GET["validate"]=="usuario")
    {
         echo '<script>swal("Atención!", "Este usuario ya esta siendo usado en otra cuenta.", "error");
     </script>';
    }
  }  
 ?>
</body>
</html>
