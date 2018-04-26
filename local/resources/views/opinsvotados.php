<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <title>
                    OpinionApp
                </title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
                    <!-- Bootstrap 3.3.7 -->
                    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

                    <link href="../local/resources/views/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
                    <!-- Font Awesome -->
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"/>
                    <!-- Ionicons -->
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet"/>
                    <!-- Theme style -->
                    <link href="../local/resources/views/dist/css/AdminLTE.min.css" rel="stylesheet"/>
                    <!-- AdminLTE Skins. Choose a skin from the css/skins
                           folder instead of downloading all of them to reduce the load. -->
                    <link href="../local/resources/views/dist/css/skins/_all-skins.min.css" rel="stylesheet"/>
                    <!-- Morris chart -->
                    <!-- jvectormap -->
                    <link href="../local/resources/views/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"/>
                    <!-- Date Picker -->
                    <link href="../local/resources/views/plugins/datepicker/datepicker3.css" rel="stylesheet"/>
                    <!-- Daterange picker -->
                    <link href="../local/resources/views/plugins/daterangepicker/daterangepicker.css" rel="stylesheet"/>
                    <!-- bootstrap wysihtml5 - text editor -->
                    <link href="../local/resources/views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet"/>
                    <!--<link href="http://justindomingue.github.io/ohSnap/stylesheets/app.css" rel="stylesheet"/>-->
                    <!-- Google Font -->
                    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet"/>
                    <link href="../local/resources/views/estilos/styles.css" rel="stylesheet"/>
                    <link href="../local/resources/views/estilos/mystyle.css" rel="stylesheet"/>
                     

                    <link href="http://code.sigasoft.com.br/sweetalert2/dist/sweetalert2.css" rel="stylesheet"/>
                </meta>
            </meta>
        </meta>
        <?php include("local/resources/views/estilos/estilos.php");?>
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
    <?php include('local/resources/views/webserv/lang.php');?>
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
            <div class="box-header with-border" >
                <button onClick="history.back()" class="btn btn-primary btn-xs" style="width: 70px;margin-top: -2px;"><i class="fa fa-arrow-left" style="padding-right: 5px;"></i>Volver</button> <h3 class="box-title" style="vertical-align:  middle; ">Detalle de opin</h3> 
            </div>
            <!-- /.box-header -->
             <div class="box-body" style="max-width: 800px; margin: 0 auto;">
            <div class="col-md-1 col-sm-0"></div>
              <div class="col-md-10 col-sm-12 text-center sp " >
               <?php 
                  $foto="0.png";
                  $carpeta="0";
                 if($infouno[0]->nombreFoto!="")
                 {
                    $foto=$infouno[0]->nombreFoto;
                    $carpeta=$infouno[0]->idEncuesta;
                 } 
               ?>
              <div class="col-sm-12 sp sombra-interna" style="padding-top: 50px;padding-bottom: 50px; border-radius: 10px;">
                  <img class="sombra" src="http://opinion-app.com/upload/fotos/encuestas/<?php echo $carpeta;?>/<?php echo $foto;?>" style="border-radius: 10px; width: 80%;">

                  <h3 ><?php echo $infouno[0]->textoPregunta;?></h3>
                   <div class="col-xs-12 " style="padding: 0px;">
                        <div class="col-xs-4 text-center">
                           <li style="list-style: none;">
                              <img src="../local/resources/views/img/open.png" alt="User Image">
                              <?php if($infouno[0]->publica == 1)
                                  { 

                                    echo "<script >var publico='".$array["es"]["CompletedPollDesc_ispublic"]."';</script>"; 
                                    echo"</br><span onClick='opin_publico(publico)'>Opin Público</span>";
                                  }
                                  else
                                  {
                                    echo "<script >var privado='".$array["es"]["CompletedPollDesc_isprivate"]."';</script>"; 
                                    echo"</br><span onClick='opin_privado(privado)'>Opin Privados</span>";
                                  }
                                  ?> 
                            </li>
                        </div>

                       <div class="col-xs-4 text-center"> 
                            <li style="list-style: none;">
                                  <img src="../local/resources/views/img/alarm-clock.png" alt="User Image">

                                  <?php  
                                  echo "<script >var decline='".$array["es"]["CompletedPollDesc_nodeadline"]."';</script>";
                                  if($infouno[0]->fechaFin == "")
                                  {
                                    echo"</br><span onClick='opin_sin_limite(decline)'>No limitado</span>";
                                  }
                                  else
                                  {
                                  echo "<script >var nodecline='".$array["es"]["CompletedPollDesc_deadline"]."';</script>";
                                    echo"</br>
                                     <span onClick='opin_con_limite(nodecline)'>Limitado</br><i style='margin-right:5px;color:#8e0015;font-size: 12px;' class='fa fa-flag'></i>".$infouno[0]->fechaFin."</span>";
                                  }
                                  ?> 
                          </li>
                       
                       </div>    
                       <div class="col-xs-4 text-center">
                           <li style="list-style: none;">
                                  <div >

                                  <?php if($infouno[0]->seleccionUnica==1)
                                  {
                                    echo "<script >var una_seleccion='".$array["es"]["PollDesc_nrp_pc"]."';</script>";
                                    echo'<img onClick="opin_privado(una_seleccion)" src="http://www.opinion-app.com/upload/fotos/app/1.svg" style="width: 25px;">';
                                  }
                                  else
                                  {
                                    echo "<script >var n_seleccion='".$array["es"]["PollDesc_nrp_po"]."';</script>";
                                    echo'<img onClick="opin_privado(n_seleccion)" src="http://www.opinion-app.com/upload/fotos/app/N_.png" style="width: 25px;">';

                                    
                                  }
                                  ?>
                                   </div> <span>Posibles respuestas</span> 
                          </li>
                       </div>                         
                   </div>
 
                   <div class="col-xs-12" style="padding: 0px;margin-top: 10px;">
                        <div class="col-xs-4 text-center" style="padding-right: 0px; padding-left: 0px;">
                           <i style="margin-right:5px;color:#006804;" class="fa fa-flag"> <span style="font-size: 12px;color:#000; font-family: 'Arial';padding-left: 5px;"> <?php echo $infouno[0]->fechaInicio;?></span></i>
                        </div> 

                          <div class="col-xs-4 text-center" style="padding-right: 0px; padding-left: 0px;">
                          <i class="ion ion-stats-bars"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;padding-right: 5px;"><?php echo $infouno[0]->numeroVotantes;?> votos</span></i>
                           <i class="fa fa-heart"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;"><?php echo $infouno[0]->numeroFavoritos;?></span></i>
                        </div> 

                          <div class="col-xs-4 text-center" style="padding-right: 0px; padding-left: 0px;">
                           <i class="fa fa-user"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;">
                          <?php if($infouno[0]->login==null){echo "Opinion App";}
                          else
                          {
                            echo $infouno[0]->login;
                          }
                          ?>  
                           </span></i>
                        </div>    
                   </div>
                   </div>

                   <div class="col-xs-12 text-left" style="padding: 0px;padding-top: 15px;">
                         <?php 
                         $total=0;
                         $sumar=0;
                         ?>
                         <?php foreach ($preguntas as $key ) {
                           $total=$total+$key->cantidad;
                         }?>
                         <table class="table table-condenced">
                         <?php 
                          $bandera=0;
                          $contador_estilo=0; 
                          $valor_entrada=0;
                          $porcentaje_total=0;
                          foreach ($preguntas as $key ) { 
                          if($contador_estilo==14)
                          {
                            $contador_estilo=0;
                          }                                                  
                          $porcentaje=100 - number_format(($key->cantidad*100)/$total, 1, '.', '');
                          if($bandera==0){
                            $sumar=$porcentaje;
                            $bandera=1;
                            $valor_entrada=$key->cantidad;
                            $porcentaje_total=number_format((($key->cantidad*100)/$total)+$sumar, 1, '.', '');
                          }
                          else
                          {
                            $porcentaje_total=number_format(($key->cantidad*100)/$valor_entrada, 1, '.', '');
                          }
                          
                          if($key->cantidad==0)
                          {
                            $porcentaje_total=0;
                          }
                          $barra=""; 
                          if(number_format(($key->cantidad*100)/$total, 1, '.', '')>11)
                          {
                            $barra='<div class="progress-bar answer-bg-color-'.$contador_estilo.' sombra-barra" role="progressbar"
                                             aria-valuenow="21" aria-valuemin="0" aria-valuemax="100"
                                             style="width: '.$porcentaje_total.'%;"> 
                                          <div class="text-left" style="padding-left:15px;">'.$key->cantidad." votos ( ".number_format(($key->cantidad*100)/$total, 1, '.', '')."% )".'</div>
                                        </div> ';
                          }
                          else
                          {
                             $barra='<div class="progress-bar answer-bg-color-'.$contador_estilo.' sombra-barra" role="progressbar"
                                             aria-valuenow="21" aria-valuemin="0" aria-valuemax="100"
                                             style="width: '.$porcentaje_total.'%;"> 
                                          <div class="text-left" style="padding-left:15px;">&nbsp;</div>
                                        </div> <span style="padding-left:10px;">'.$key->cantidad." votos ( ".number_format(($key->cantidad*100)/$total, 1, '.', '')."% )".'</span>'                                   
                                        ;

                          }
                            echo '<tr>
                                       <td style="width: 36%;text-align: right;padding-top: 11px;"><strong>'.$key->textoRespuesta.'</strong></td>
                                       <td style="vertical-align: middle;"> 
                                        '.$barra.' 
                                      </td>
                                     </tr> '; 
                                    $contador_estilo=$contador_estilo+1;
                         
                         }?>
                           
                         </table>
                     
                      <div class="text-center">
                            <button class="btn form-control btn-danger" style="margin-top: 10px;border-radius: 30px;">Ya ha votado en este opin</button>
                      </div>
                    
                   </div>

                    <div class="col-xs-12 text-left sombra" style="padding: 15px;border-radius: 10px;margin-top: 20px;">
                       <h4 class="text-center">Comparte el link para que otras personas voten</h4>
                       <input id="url"  class="form-control" value="<?php echo'http://opinion-app.com/share.php?id='.$identificador.'&type=PC';?>" type="" name="" style="margin-top: 5px;">
                         <div class="text-center" style="padding-top: 10px;">
                            <button onclick="copiar('#url')" class="btn btn-primary" style="margin-top: 10px;">Copiar link</button>
                      </div>
                   </div>

                    <div class="col-xs-12 text-left sombra" style="padding: 15px;border-radius: 10px;margin-top: 20px;">
                       <h4 class="text-center">Compartir en tus redes sociales</h4>
                        <div class="col-xs-3 text-center" style="padding-top: 10px;">
                               <img src="../local/resources/views/img/whatsapp.png" alt="User Image">    
                        </div>
                         <div class="col-xs-3 text-center" style="padding-top: 10px;">
                               <img src="../local/resources/views/img/twitter.png" alt="User Image">    
                        </div>
                         <div class="col-xs-3 text-center" style="padding-top: 10px;">
                               <img src="../local/resources/views/img/facebook.png" alt="User Image">    
                        </div>
                         <div class="col-xs-3 text-center" style="padding-top: 10px;">
                               <img src="../local/resources/views/img/google-plus.png" alt="User Image">    
                        </div>
                   </div>

                    <div class="text-center" style="padding-top: 10px;">
                            <button onClick="history.back()" class="btn btn-primary" style="margin-top: 10px;width: 90px;"><i class="fa fa-arrow-left" style="padding-right: 5px;"></i>Volver</button>
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
 <!--Publicidad de adcense-->       
 
<!-- /.info-box -->
<!-- /.content -->
<!-- /.content-wrapper -->
<?php //include('includes/footer.php');?>
<div class="control-sidebar-bg">
</div>
<script src="../local/resources/views/dist/js/particles2.js"></script> 
<!-- jQuery 3.1.1 -->
<script src="../local/resources/views/plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../local/resources/views/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 
<!-- Sparkline -->
<script src="../local/resources/views/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../local/resources/views/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../local/resources/views/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../local/resources/views/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../local/resources/views/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../local/resources/views/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../local/resources/views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../local/resources/views/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../local/resources/views/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../local/resources/views/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) --> 
<!-- AdminLTE for demo purposes -->
<script src="../local/resources/views/dist/js/demo.js"></script>
<script src="https://rawgithub.com/justindomingue/ohSnap/master/ohsnap.js"></script>
<!-- <script type="text/javascript" src="https://sweetalert.js.org/assets/sweetalert/sweetalert.min.js">  </script>-->

<script src="../local/resources/views/dist/js/particles.js"></script> 
 
<script src="http://code.sigasoft.com.br/sweetalert2/dist/sweetalert2.min.js"></script>

<script type="text/javascript">
  function copiar(id_elemento) {// seleccionar el texto de la dirección de email
  window.getSelection().removeAllRanges();
  var email = document.querySelector(id_elemento);
  var range = document.createRange();
  range.selectNode(email);

  window.getSelection().addRange(range); 
  try {
    // intentar copiar el contenido seleccionado
    var resultado = document.execCommand('copy');

    swal({type: 'success',title: '',text: 'En enlace ha sido copiado correctamente',});
  } catch(err) {
    console.log('ERROR al intentar copiar el email');
  } 
  window.getSelection().removeAllRanges(); 
}


function opin_publico(id)
{
  swal({type: 'info',title: ''+id, text: ''});
}
function opin_privado(id)
{
  swal({type: 'info',title: ''+id, text: ''});
}

function opin_sin_limite(id)
{
 
  swal({type: 'info',title: ''+id, text: ''});
}
function opin_con_limite(id)
{
  swal({type: 'info',title: ''+id, text: ''});
}

function opin_una_respuesta(id)
{
  swal({type: 'info',title: ''+id, text: ''});
}
function opin_n_respuesta(id)
{
  swal({type: 'info',title: ''+id, text: ''});
}
</script> 
    </body>
</html>

