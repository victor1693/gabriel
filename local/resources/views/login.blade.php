<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
            <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
                <title>
                    OpinionApp
                </title>
                <?php include('local/resources/views/includes/referencias_top.html');?>

                <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    
		<!-- scripts -->
    </head>
	

	
    <!-- <body class="hold-transition login-page" style="background-image: url('https://www.ibm.com/blogs/business-analytics/wp-content/uploads/2017/02/data-analytics-too-much-data.jpg');"> -->
    <body class="hold-transition login-page" style="">

	<div id="particles-js" style="background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #19b08c), color-stop(70%, #26819f)) !important; z-index: -1 !important;"></div>  
		<div class="login-box mylogin">
			<!-- particles.js container --> 
            <div class="register-logo">
                <a href="iniciar" style="color: white;">
                    <b>
                        Opinion
                    </b>
                    App
                </a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body box-style">
                <p class="login-box-msg">
                    Completa los datos para iniciar sesión
                </p>
                <form action="login" id="formulario_login" method="post">
                    <input name="_token" type="hidden" value="" id="my_token">
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
                                <a class="btn btn-primary btn-block btn-flat" id="btn_entrar" onclick="enviar_formulario()" style="margin-bottom: 10px;">
                                    Entrar
                                </a>
                                 <div class="text-left pull-left"><a onClick="recuperar_clave()" href="#" data-toggle="modal" data-target="#modal_recuperar_clave">¿Olvidó su clave?</a> 
                                 </div>
                                 <label class="pull-right"><input onClick="guardar_datos_formulario()" type="checkbox" id="btn_recordar" value="first_checkbox">Recordarme</label><br>
                            </div>
                            <div class="col-xs-12 text-center" style="padding-top: 5px;">
                                <a class="" href="register" style="margin-top: 15px;">
                                    Nueva cuenta
                                </a>
                            </div>

                            <div class="col-xs-12 text-center" style="padding-top: 10px;border-top: 1px solid #cecece;margin-top: 5px;">
                                <a class="" href="mailto:victor.fernandez.18@hotmail.com?subject=problema para iniciar sesión" style="margin-top: 15px;color: #000;">
                                   ¿Tienes problemas para entrar? Cuéntanoslo.
                                </a> 
                            </div>
                            
                        </div>
                    </input>
                </form>
            </div>


            <!-- /.login-box-body -->
            <div id="ohsnap">
            </div>
			   
        </div> 
   <!--</div>-->
		
 
		
		<!-- /.login-box -->
        <!-- jQuery 3.1.1 -->
        <?php include('local/resources/views/includes/referencias_down.php');?>
<script type="text/javascript">
    function guardar_datos_formulario()
    {
        
        if($("#btn_recordar").prop('checked'))
        {
          $('#formulario_login').formcache();
        }else
        {
            $('#formulario_login').formcache('removeCache');
            $('#formulario_login').formcache('removeCaches');
        }
       
    }
</script>


<!--Funcion modal para recuperar clave-->
<script type="text/javascript">
  function recuperar_clave()
  {

swal({
  title: 'Recuperar Clave',
  html:'<input id="correo_recuperar" class="form-control" type="" name="">',
  type: 'info',
  
  showCancelButton: true, 
  confirmButtonText: 'Enviar',
  cancelButtonText: 'Salir', 
  closeOnConfirm: false,
  closeOnCancel: true
},
function(isConfirm) {
  if (isConfirm) {
    if($("#correo_recuperar").val()!="")
    {
        enviar_correo_con_clave(); 
    }
    else
    {
        $("#correo_recuperar").focus();
    }
   
  }  
});
  }
</script>
<!--Validacion de login del lado del servidor-->
         <?php
        if (isset($_GET["info"])) {
            if ($_GET["info"] == "correo") {
                echo "<script>swal({
                      type: 'info',
                      title: 'Atención',
                      text: 'Debe colocar el correo.', 
                    });$('#correo').focus();  </script>";
            } 
            else if ($_GET["info"] == "pass") {
                  echo "<script>swal({
                      type: 'info',
                      title: 'Atención',
                      text: 'Debe colocar clave.', 
                    });$('#pass').focus();  </script>";
            } else if ($_GET["info"] == "false") {
                  echo "<script>swal({
                      type: 'error',
                      title: 'Atención',
                      text: 'Usuario no registrado.', 
                    });$('#correo').focus();  </script>";
            }
        }
        if (isset($_GET["activate"])) {
            if ($_GET["activate"] == "false") {
                echo "<script>swal({
                      type: 'info',
                      title: 'Atención',
                      text: 'Esta cuenta se encuentra desactivada.', 
                    });$('#correo').focus();  </script>";
            }
        }
        ?>      
       
<script type="text/javascript"> 
$( document ).ready(function() { 
 $('#formulario_login').formcache(); 
 if($("#correo").val()!="" || $("#pass").val()!="")
 {
    $("#btn_recordar").attr('checked','checked');
 } 
   $("#my_token").val($('meta[name="csrf-token"]').attr('content')); 
}); 
   
</script>
<script type="text/javascript">
function enviar_correo_con_clave()
    {    
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });  
        $.ajax({
            url: 'recuperarc',
            type: 'post',
            data:{correo:$("#correo_recuperar").val()}, 
            success: function(data)  
            { 
                if(data==0)
                {
                    swal({
                      type: 'info',
                      title: 'Atención',
                      text: 'El usuario se encuentra inactivo.'
                    });
                }
                else if(data==2)
                {
                     swal({
                      type: 'error',
                      title: 'Importante',
                      text: 'Este usuario no se encuentra registrado.'
                    });
                }

                 else if(data==1)
                {
                     swal({
                      type: 'success',
                      title: 'Listo',
                      text: 'Se le ha enviado un correo con su clave.'
                    });
                }

                 else if(data==1)
                {
                     swal({
                      type: 'error',
                      title: 'Fatal!',
                      text: 'Algo ha fallado, intente de nuevo.'
                    });
                }
            }
               
        });
    } 
</script>
 
<!--Validacion de login del lado del Cliente-->
        <script type="text/javascript"> 
            function enviar_formulario()
                  {
                    if($("#correo").val()=="")
                    {
                     swal({
                      type: 'info',
                      title: 'Atención',
                      text: 'Debe colocar el correo.', 
                    });
                    $('#correo').focus();
                    }
                    else if($("#pass").val()==""){
                   
                    swal({
                      type: 'info',
                      title: 'Atención',
                      text: 'Debe colocar su clave.', 
                    });

                    $('#pass').focus();
                    }
                    else{$("#formulario_login").submit();}
                  }
        </script>          
</body>
</html>