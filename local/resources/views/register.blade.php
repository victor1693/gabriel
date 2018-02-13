<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registro</title>
  <?php include('local/resources/views/includes/referencias_top.html');?>
</head>
<body class="hold-transition register-page" style="background-image: url('https://www.ibm.com/blogs/business-analytics/wp-content/uploads/2017/02/data-analytics-too-much-data.jpg');">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Opinion</b>App</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Complete la información solicitada.</p>

    <form action="../../index.html" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nombre">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Correo">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
        <input type="date" class="form-control" placeholder="Fecha de nacimiento"  >
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Clave">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Repita su clave">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
         
        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form> 
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3.1.1 -->
<?php include('local/resources/views/includes/referencias_down.php');?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
