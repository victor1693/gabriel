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
           <div class="box-header with-border" >
                <button onClick="history.back()" class="btn btn-primary btn-xs" style="width: 70px;margin-top: -2px;"><i class="fa fa-arrow-left" style="padding-right: 5px;"></i>Volver</button> <h3 class="box-title" style="vertical-align:  middle; ">Detalle de opin</h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="max-width: 800px; margin: 0 auto;">
            <div class="col-md-1 col-sm-0"></div>
              <div class="col-md-10 col-sm-12 text-center sp" >
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
                    <h3 ><?php echo $infouno[0]->textoPregunta;?> </h3>
                   <div class="col-xs-12" style="padding: 0px;">
                        <div class="col-xs-4 text-center">
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
                                    echo"</br>
                                     <a class='users-list-name' href='#'><i style='margin-right:5px;color:#8e0015;font-size: 12px;' class='fa fa-flag'></i>".$infouno[0]->fechaFin."</a>";
                                  }
                                  ?>
                                  
                          </li>
                       
                       </div>   
                       <div class="col-xs-4 text-center">
                           <li style="list-style: none;">
                                  <img src="local/resources/views/img/like.png" alt="User Image">
                                  
                                <?php if($infouno[0]->favorito == "")
                                  {
                                    echo'<a class="users-list-name" href="#">No favorito</a>  ';
                                  }
                                  else
                                  {
                                    echo'<a class="users-list-name" href="#">Favorito</a> ';
                                  }
                                  ?> 
                          </li>
                       </div>                         
                   </div>

                   <div class="col-xs-12" style="padding: 0px;margin-top: 10px;">
                        <div class="col-xs-4 text-center" style="padding-right: 0px; padding-left: 0px;">
                           <i style=",margin-right:5px;color:#006804;"" class="fa fa-flag"> <span style="font-size: 12px;font-family: 'Arial';color:#000;padding-left: 5px;"> <?php echo $infouno[0]->fechaInicio;?></span></i>
                        </div>  

                          <div class="col-xs-4 text-center" style="padding-right: 0px; padding-left: 0px;">
                          <i class="ion ion-stats-bars"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;padding-right: 5px;"><?php echo $infouno[0]->numeroVotantes;?> votos</span></i>
                           <i class="fa fa-heart"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;"><?php echo $infouno[0]->numeroFavoritos;?></span></i>
                        </div> 

                          <div class="col-xs-4 text-center" style="padding-right: 0px; padding-left: 0px;">
                           <i class="fa fa-user"> <span style="font-size: 12px;font-family: 'Arial';padding-left: 5px;"> <?php if($infouno[0]->login==null){echo "Opinion App";}
                          else
                          {
                            echo $infouno[0]->login;
                          }
                          ?>  </span></i>
                        </div>    
                   </div>
                  </div>

                   <div class="col-xs-12 text-left" style="padding: 0px;padding-top: 15px;padding-left: 15px;">

                    <?php
                      foreach ($preguntas as $key) {
                        echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="'.$key->idRespuestaEncuesta.'" id="defaultCheck'.$key->idRespuestaEncuesta.'">
                                <label class="form-check-label" for="defaultCheck1">
                                  '.$key->textoRespuesta.'
                                </label>
                              </div>';
                        }
                    ?> 
                      <div class="text-center">
                            <button  class="btn form-control btn-primary" style="margin-top: 10px;border-radius: 30px;">Votar y ver resultados</button>
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
                               <img src="local/resources/views/img/whatsapp.png" alt="User Image">    
                        </div>
                         <div class="col-xs-3 text-center" style="padding-top: 10px;">
                               <img src="local/resources/views/img/twitter.png" alt="User Image">    
                        </div>
                         <div class="col-xs-3 text-center" style="padding-top: 10px;">
                               <img src="local/resources/views/img/facebook.png" alt="User Image">    
                        </div>
                         <div class="col-xs-3 text-center" style="padding-top: 10px;">
                               <img src="local/resources/views/img/google-plus.png" alt="User Image">    
                        </div>
                   </div>

                   <div class="text-center" style="padding-top: 10px;">
                            <button onClick="history.back()" class="btn btn-primary" style="margin-top: 10px;width: 90px;">Volver</button>
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

<?php //include('includes/footer.php');?>
<div class="control-sidebar-bg">
</div>
<?php include('local/resources/views/includes/referencias_down.php');?>

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
</script> 

    </body>
</html>
<!-- /.info-box -->
<!-- /.content -->
<!-- /.content-wrapper -->
