<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <title>
                    OpinionApp
                </title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                    <!-- Bootstrap 3.3.7 -->
                    <?php include('local/resources/views/includes/referencias_top.html');?>
                </meta>
            </meta>
        </meta>
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
              <h3 class="box-title">Detalle de opin</h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="background-image: url('local/resources/views/img/fondo.png')">
            <div class="col-md-2 col-sm-0"></div>
              <div class="col-md-8 col-sm-12 text-center sp" >
                  <img  src="local/resources/views/img/perfil.jpg">
                  <h3>Acá irá el texto de la pregunta del opins</h3>
                   <div class="col-xs-12" style="padding: 0px;">
                        <div class="col-xs-4 text-left">
                           <li style="list-style: none;">
                              <img src="local/resources/views/img/open.png" alt="User Image">
                              <a class="users-list-name" href="#">Opin Público</a> 
                            </li>
                        </div>
                       <div class="col-xs-4 text-center"> 
                            <li style="list-style: none;">
                                  <img src="local/resources/views/img/alarm-clock.png" alt="User Image">
                                  <a class="users-list-name" href="#">No limitado</a> 
                          </li>
                       
                       </div>   
                       <div class="col-xs-4 text-right">
                           <li style="list-style: none;">
                                  <img src="local/resources/views/img/like.png" alt="User Image">
                                  <a class="users-list-name" href="#">Favorito</a> 
                          </li>
                       </div>                         
                   </div>

                   <div class="col-xs-12" style="padding: 0px;margin-top: 10px;">
                        <div class="col-xs-4 text-left">
                           <i class="fa fa-flag"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;"> 09-02-2018</span></i>
                        </div> 

                          <div class="col-xs-4 text-center">
                          <i class="ion ion-stats-bars"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;padding-right: 5px;">47 votos</span></i>
                           <i class="fa fa-heart"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;">4</span></i>
                        </div> 

                          <div class="col-xs-4 text-right">
                           <i class="fa fa-user"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;">Opinion App</span></i>
                        </div>    
                   </div>

                   <div class="col-xs-12 text-left" style="padding: 0px;padding-top: 15px;padding-left: 15px;">
                       <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                          <label class="form-check-label" for="defaultCheck1">
                            Opcion 1
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                          <label class="form-check-label" for="defaultCheck1">
                            Opcion 2
                          </label>
                        </div>
                     
                      <div class="text-center">
                            <button class="btn form-control btn-primary" style="margin-top: 10px;">Votar y ver resultados</button>
                      </div>
                    
                   </div>

                    <div class="col-xs-12 text-left" style="padding: 0px;padding-top: 15px;padding-left: 15px;">
                       <h4>Link para compartir</h4>
                       <input class="form-control" value="link" type="" name="" style="margin-top: 5px;">
                         <div class="text-center" style="padding-top: 10px;">
                            <button class="btn btn-primary" style="margin-top: 10px;">Copiar link</button>
                      </div>
                   </div>

                   <div class="col-xs-12 text-left" style="padding: 0px;padding-top: 15px;padding-left: 15px;">
                       <h4>Compartir en tus redes sociales</h4>
                        <div class="col-sm-3 text-left" style="padding-top: 0px;">
                               <img src="local/resources/views/img/whatsapp.png" alt="User Image">    
                        </div>
                         <div class="col-sm-3 text-center" style="padding-top: 0px;">
                               <img src="local/resources/views/img/twitter.png" alt="User Image">    
                        </div>
                         <div class="col-sm-3 text-center" style="padding-top: 0px;">
                               <img src="local/resources/views/img/facebook.png" alt="User Image">    
                        </div>
                         <div class="col-sm-3 text-right" style="padding-top: 0px;">
                               <img src="local/resources/views/img/google-plus.png" alt="User Image">    
                        </div>
                   </div>
              </div>
            <div class="col-md-2 col-sm-0"></div>
              <!-- /.table-responsive -->
            </div> 
            <!-- /.box-footer -->
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
