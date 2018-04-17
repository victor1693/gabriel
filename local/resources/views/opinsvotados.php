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
        <style type="text/css">
          .circulo {
               width: 24px;
               height: 24px;
               -moz-border-radius: 50%;
               -webkit-border-radius: 50%;
               border-radius: 50%;
               background: #5cb85c; 
          }
               .sombra
               {
                -webkit-box-shadow: 0px 0px 23px 0px rgba(0,0,0,0.40);
                -moz-box-shadow: 0px 0px 23px 0px rgba(0,0,0,0.40);
                box-shadow: 0px 0px 23px 0px rgba(0,0,0,0.40);
               }

               .sombra-interna
               {
                -webkit-box-shadow: inset 0px 0px 23px 0px rgba(0,0,0,0.40);
                -moz-box-shadow: inset 0px 0px 23px 0px rgba(0,0,0,0.40);
                box-shadow: inset 0px 0px 23px 0px rgba(0,0,0,0.40);
               }

               .sombra-barra
               {
                border-radius: 5px;
             -webkit-box-shadow: 6px 7px 13px 0px rgba(0,0,0,0.49);
-moz-box-shadow: 6px 7px 13px 0px rgba(0,0,0,0.49);
box-shadow: 6px 7px 13px 0px rgba(0,0,0,0.49);
               }
          
        </style>
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
            <div class="box-body">
            <div class="col-md-1 col-sm-0"></div>
              <div class="col-md-10 col-sm-12 text-center sp " >
              <div class="col-sm-12 sp sombra-interna" style="padding-top: 50px;padding-bottom: 50px; border-radius: 10px;">
                  <img class="sombra" src="local/resources/views/img/perfil.jpg" style="border-radius: 10px; width: 80%;">

                  <h3><?php echo $infouno[0]->textoPregunta;?></h3>
                   <div class="col-xs-12 " style="padding: 0px;">
                        <div class="col-xs-4 text-left">
                           <li style="list-style: none;">
                              <li style="list-style: none;">
                              <img src="local/resources/views/img/open.png" alt="User Image">
                              <?php if($infouno[0]->publica == 1)
                                  {
                                    echo'<a class="users-list-name" href="#">Opin Público</a> ';
                                  }
                                  else
                                  {
                                    echo'<a class="users-list-name" href="#">Opin Privado</a> ';
                                  }
                                  ?>
                              
                            </li> 
                            </li>
                        </div>
                       <div class="col-xs-4 text-center">  
                            <li style="list-style: none;">
                                  <img src="local/resources/views/img/alarm-clock.png" alt="User Image">

                                  <?php if($infouno[0]->fechaFin == "")
                                  {
                                    echo'<a class="users-list-name" href="#">No limitado</a> ';
                                  }
                                  else
                                  {
                                    echo'<a class="users-list-name" href="#">Finaliza '.$infouno[0]->fechaFin.'</a> ';
                                  }
                                  ?> 
                          </li>
                       
                       </div>   
                       <div class="col-xs-4 text-right">
                           <li style="list-style: none;">
                                  <p style="font-size: 18px;color: #fff;" class="circulo text-center pull-right"><?php echo $infouno[0]->seleccionUnica;?> </p> 
                                  <a class="users-list-name pull-right" href="#" style="margin-top: 24px;margin-right: -25px;">Posibles respuestas</a> 
                          </li>
                       </div>                         
                   </div>

                   <div class="col-xs-12" style="padding: 0px;margin-top: 10px;">
                        <div class="col-xs-4 text-left">
                           <i class="fa fa-flag"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;"> <?php echo $infouno[0]->fechaInicio;?></span></i>
                        </div> 

                          <div class="col-xs-4 text-center">
                          <i class="ion ion-stats-bars"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;padding-right: 5px;"><?php echo $infouno[0]->numeroVotantes;?> votos</span></i>
                           <i class="fa fa-heart"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;"><?php echo $infouno[0]->numeroFavoritos;?></span></i>
                        </div> 

                          <div class="col-xs-4 text-right">
                           <i class="fa fa-user"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;">Opinion App</span></i>
                        </div>    
                   </div>
                   </div>

                   <div class="col-xs-12 text-left" style="padding: 0px;padding-top: 15px;padding-left: 15px;">
                         <?php $total=0;
                         $sumar=0;
                         ?>
                         <?php foreach ($preguntas as $key ) {
                           $total=$total+$key->cantidad;
                         }?>
                         <table class="table table-condenced">
                         <?php 
                          $bandera=0;
                          foreach ($preguntas as $key ) {                         
                          $porcentaje=100 - number_format(($key->cantidad*100)/$total, 2, '.', '');
                          if($bandera==0){$sumar=$porcentaje;$bandera=1;}                          
                            echo '<tr>
                                       <td style="width: 20%;text-align: right;padding-top: 11px;"><strong>'.$key->textoRespuesta.'</strong></td>
                                       <td style=""> 
                                        <div class="progress-bar progress-bar-info sombra-barra" role="progressbar"
                                             aria-valuenow="21" aria-valuemin="0" aria-valuemax="100"
                                             style="width: '.number_format((($key->cantidad*100)/$total)+$sumar, 2, '.', '').'%;">
                                          <span class="sr-only">'.number_format(($key->cantidad*100)/$total, 2, '.', '').'% completado</span>
                                          '.number_format(($key->cantidad*100)/$total, 2, '.', '').'%
                                        </div> 
                                      </td>
                                     </tr> '; 
                         }?>
                           
                         </table>
                     
                      <div class="text-center">
                            <button class="btn form-control btn-danger" style="margin-top: 10px;border-radius: 30px;">Ya ha votado en este opin</button>
                      </div>
                    
                   </div>

                    <div class="col-xs-12 text-left sombra" style="padding: 15px;border-radius: 10px;margin-top: 20px;">
                       <h4 class="text-center">Comparte el link para que otras personas voten</h4>
                       <input class="form-control" value="link" type="" name="" style="margin-top: 5px;">
                         <div class="text-center" style="padding-top: 10px;">
                            <button class="btn btn-primary" style="margin-top: 10px;">Copiar link</button>
                      </div>
                   </div>

                    <div class="col-xs-12 text-left sombra" style="padding: 15px;border-radius: 10px;margin-top: 20px;">
                       <h4 class="text-center">Compartir en tus redes sociales</h4>
                        <div class="col-sm-3 text-center" style="padding-top: 10px;">
                               <img src="local/resources/views/img/whatsapp.png" alt="User Image">    
                        </div>
                         <div class="col-sm-3 text-center" style="padding-top: 10px;">
                               <img src="local/resources/views/img/twitter.png" alt="User Image">    
                        </div>
                         <div class="col-sm-3 text-center" style="padding-top: 10px;">
                               <img src="local/resources/views/img/facebook.png" alt="User Image">    
                        </div>
                         <div class="col-sm-3 text-center" style="padding-top: 10px;">
                               <img src="local/resources/views/img/google-plus.png" alt="User Image">    
                        </div>
                   </div>
              </div>
            <div class="col-md-1 col-sm-0"></div>
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
