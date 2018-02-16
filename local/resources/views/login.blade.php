<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OpinionApp</title>
   <?php include('local/resources/views/includes/referencias_top.html');?>
</head>
<body class="hold-transition login-page" style="background-image: url('https://www.ibm.com/blogs/business-analytics/wp-content/uploads/2017/02/data-analytics-too-much-data.jpg');">
<div class="login-box">
   <div class="register-logo">
    <a href="iniciar"><b>Opinion</b>App</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Completa los datos para iniciar sesión</p>
    <form action="login" method="post" id="formulario">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group has-feedback">
        <input id="correo" name="correo" type="text" class="form-control" placeholder="Correo o usuario">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="pass" name="pass" type="password" class="form-control" placeholder="Clave">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">        
        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <a onClick="enviar_formulario()" id="btn_entrar"   class="btn btn-primary btn-block btn-flat">Entrar</a>
        </div>
        <div class="col-xs-12" style="padding-top: 10px;">    
          <a href="register" class="" style="margin-top: 15px;">Nueva cuenta</a>
        </div>
        <!-- /.col -->
      </div>
    </form> 
  </div>
  <!-- /.login-box-body -->
  <div id="ohsnap"></div>
</div>

<!-- /.login-box -->
<!-- jQuery 3.1.1 -->
<?php include('local/resources/views/includes/referencias_down.php');?>

<script type="text/javascript">
  function enviar_formulario()
  {
    if($("#correo").val()==""){ohSnap('Debe colorcar su correo.', {color: 'orange '});$('#correo').focus();}
    else if($("#pass").val()==""){ohSnap('Debe colorcar su clave.', {color: 'orange '});$('#pass').focus();}
    else{$("#formulario").submit();}
  }
  
</script>>

<?php
  if(isset($_GET["info"]))
  {
    if($_GET["info"]=="correo") echo "<script>ohSnap('Debe colorcar su correo.', {color: 'orange '});$('#correo').focus();</script>";
    else if($_GET["info"]=="pass") echo "<script>ohSnap('Debe colorcar su clave.', {color: 'orange '});$('#pass').focus();</script>";
    else if($_GET["info"]=="false") echo "<script>ohSnap('Usuario no registrado.', {color: 'red'});$('#pass').focus();</script>";
  } 
  if(isset($_GET["activate"]))
  {
    if($_GET["activate"]=="false")
    {
       echo '<script>swal("Atención!", "Esta cuenta aún no ha sido activada, revice el su correo.", "info");
     </script>';
    }
  }  
 ?>
</body>
</html>
