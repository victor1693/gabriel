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
    <a href="../../index2.html"><b>Opinion</b>App</a>
  </div>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Completa los datos para iniciar sesión</p>

    <form action="login" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group has-feedback">
        <input name="correo" type="text" class="form-control" placeholder="Correo o usuario">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="pass" type="password" class="form-control" placeholder="Clave">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form> 

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3.1.1 -->
<?php include('local/resources/views/includes/referencias_down.php');?>
 
</body>
</html>
