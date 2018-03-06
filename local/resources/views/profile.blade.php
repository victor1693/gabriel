<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
            <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
                <title>
                    OpinionApp
                </title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
                    <!-- Bootstrap 3.3.7 -->
                    <?php include('local/resources/views/includes/referencias_top.html');?>
                   
            
        <link rel="stylesheet" type="text/css" href="local/resources/views/gcss/style_stars.css">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include('local/resources/views/includes/header.php');?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('local/resources/views/includes/aside.php');?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content">
                <?php include('local/resources/views/includes/aside_right.php');?>
                    <div class="row" style="padding: 10px;">
                        <div class="box box-info" style="padding-bottom: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Perfil</h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body text-center" style="padding-left: 10%;padding-right: 10%;">
             <div class="col-sm-12" style="border-bottom: 1px solid #e5e5e5;">
               <img src="http://lorempixel.com/200/200" class="img-responsive img-circle" style="margin:0 auto;">
               <h3><strong>Victor Fernández</strong></h3>
             </div>
             <div class="çol-md-3 col-sm-0"></div>
             <div class="çol-md-6 col-sm-12"  style="border-bottom: 1px solid #e5e5e5;">
               <table class="table table-condensed table-hover" style="width: 400px;margin: 0 auto;">
                  <tr>
                    <td class="text-right" style="padding-right: 20px;"><strong>Correo:</strong></td>
                    <td  class="text-left">Victor Fernandez</td>
                  </tr>
                  <tr>
                    <td  class="text-right"  style="padding-right: 20px;"><strong>Registro:</strong></td>
                    <td class="text-left">02-03-2018</td>
                  </tr>
                  <tr>
                    <td  class="text-right" style="padding-right: 20px;"><strong>Cumpleaños</strong></td>
                    <td  class="text-left">20-07-2008</td>
                  </tr>
               </table>
              <div class="col-sm-12" style="margin-top: 10px; border-bottom: 1px solid #e5e5e5;border-top: 1px solid #e5e5e5;padding: 10px;">
                 <div class="col-sm-4 text-center">Hombre</div>
               <div class="col-sm-4 text-center">9 Años</div>
               <div class="col-sm-4 text-center"> Venezuela</div> 
              </div> 

              <div class="col-sm-12" style="margin-top: 20px;">
                <button class="btn btn-primary btn-xs">Activo</button>
              </div>

               <div class="col-sm-12" style="margin-top: 10px;border-bottom: 1px solid #e5e5e5;">
                  <div class="col-sm-4 text-center" style="border-right: 1px solid #e5e5e5;">
                  <h2>1</h2>
                  <p>Opins</p>
                  <p style="margin-top: -10px;">Procesados</p> 
                 </div> 
               

               <div class="col-sm-4 text-center"  style="border-right: 1px solid #e5e5e5;">
                  <h2>12</h2>
                  <p>Opins</p>
                  <p style="margin-top: -10px;">Votados</p> 
                 </div> 
              

               <div class="col-sm-4 text-center"  style="border-right: 1px solid #e5e5e5;">
               <h2>5</h2>
                  <p class="clasificacion">
                    <input id="radio1" type="radio" name="estrellas" value="5"><!--
                    --><label for="radio1">★</label><!--
                    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                    --><label for="radio2">★</label><!--
                    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                    --><label for="radio3">★</label><!--
                    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                    --><label for="radio4">★</label><!--
                    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                    --><label for="radio5">★</label>
                  </p> 
                  <p style="margin-top: -10px;">Puntos</p> 
                 </div>  
             </div>

              <div class="col-sm-12" style="margin-top: 20px;padding-bottom: 20px;">
                <button class="btn btn-primary btn-xs">Cambiar clave</button>
              </div>
             <div class="çol-md-3 col-sm-0"></div>
           </div>
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
<!-- /.info-box -->
<!-- /.content -->
<!-- /.content-wrapper -->
<?php //include('includes/footer.php');?>
<div class="control-sidebar-bg">
</div>
<?php include('local/resources/views/includes/referencias_down.php');?>
