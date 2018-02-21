<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <title>
                    OpinionApp
                </title>
                <?php include('local/resources/views/includes/referencias_top.html');?>
            </meta>
        </meta>
    </head>
    <body class="hold-transition login-page" style="background-image: url('https://www.ibm.com/blogs/business-analytics/wp-content/uploads/2017/02/data-analytics-too-much-data.jpg');">
        <div class="login-box">
            <div class="register-logo">
                <a href="iniciar">
                    <b>
                        Opinion
                    </b>
                    App
                </a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">
                    Completa los datos para iniciar sesión
                </p>
                <form action="login" id="formulario" method="post">
                    <input name="_token" type="hidden" value="<?php echo csrf_token(); ?>">
                        <div class="form-group has-feedback">
                            <input class="form-control" id="correo" name="correo" placeholder="Correo o usuario" type="text">
                                <span class="glyphicon glyphicon-envelope form-control-feedback">
                                </span>
                            </input>
                        </div>
                        <div class="form-group has-feedback">
                            <input class="form-control" id="pass" name="pass" placeholder="Clave" type="password">
                                <span class="glyphicon glyphicon-lock form-control-feedback">
                                </span>
                            </input>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-xs-12 text-center">
                                <a class="btn btn-primary btn-block btn-flat" id="btn_entrar" onclick="enviar_formulario()">
                                    Entrar
                                </a>
                            </div>
                            <div class="col-xs-12" style="padding-top: 10px;">
                                <a class="" href="register" style="margin-top: 15px;">
                                    Nueva cuenta
                                </a>
                            </div>
                            <!-- /.col -->
                        </div>
                    </input>
                </form>
            </div>
            <!-- /.login-box-body -->
            <div id="ohsnap">
            </div>
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
        </script>
        >
        <?php
  if(isset($_GET["info"]))
  {
    if($_GET["info"]=="correo") echo "<script>
        ohSnap('Debe colorcar su correo.', {color: 'orange '});$('#correo').focus();
    </body>
</html>
";
    else if($_GET["info"]=="pass") echo "
<script>
    ohSnap('Debe colorcar su clave.', {color: 'orange '});$('#pass').focus();
</script>
";
    else if($_GET["info"]=="false") echo "
<script>
    ohSnap('Usuario no registrado.', {color: 'red'});$('#pass').focus();
</script>
";
  } 
  if(isset($_GET["activate"]))
  {
    if($_GET["activate"]=="false")
    {
       echo '
<script>
    swal("Atención!", "Esta cuenta aún no ha sido activada, revice el su correo.", "info");
</script>
';
    }
  }  
 ?>
