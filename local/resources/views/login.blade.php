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
		<!-- scripts -->
    </head>
	

	
    <!-- <body class="hold-transition login-page" style="background-image: url('https://www.ibm.com/blogs/business-analytics/wp-content/uploads/2017/02/data-analytics-too-much-data.jpg');"> -->
    <body class="hold-transition login-page" style="">

	<div id="particles-js" style="background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #19b08c), color-stop(70%, #26819f)) !important";>  
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
                                 <div class="text-left"><a href="#" data-toggle="modal" data-target="#modal_recuperar_clave">¿Olvidó su clave?</a></div>
                            </div>
                            <div class="col-xs-12 text-center" style="padding-top: 10px;">
                                <a class="" href="register" style="margin-top: 15px;">
                                    Nueva cuenta
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
   </div>
		
		 <!--Modal recuperar clave-->
            <div class="modal fade" id="modal_recuperar_clave" tabindex="1">
              <div class="modal-dialog" role="document"  style="width: 30%;">
                <div class="modal-content" style="border-radius: 10px;">
                  <div class="modal-header">
                    <h3 class="modal-title pull-left">Recuperación de clave</h3>
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Correo de recuperación</p>
                    <input class="form-control" type="text" id="correo_recuperación">
                  </div>
                  <div class="modal-footer">
                   <button type="button" class="btn btn-danger " data-dismiss="modal">Cancelar</button>
                    <button onClick="recuperarClave()" id="btn_aceptar_recuperar_clave" type="button" class="btn btn-primary">Aceptar</button>
                   
                  </div>
                </div>
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

        <!--Validar correo en modal de recuperacion de lave-->
        <script type="text/javascript">
        $( document ).ready(function() {
            correoValido=0;
            $('#correo_recuperación').keyup(function (e) {
                var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var EmailId = this.value;
                if (emailRegex.test(EmailId))
                {
                    $("#correo_recuperación").css( 'border-color','#d6d6d6'); 
                    correoValido=1;
                }
                    
                else
                    {
                        $("#correo_recuperación").css( 'border-color','#FF0000'); 
                        correoValido=0;
                    }
            });

            function recuperarClave()
            {
                if(correoValido){alert("Recuperar");}else{alert("No procesa");}
            }
        }); 
        </script>
        <?php
  if(isset($_GET["info"]))
  {
    if($_GET["info"]=="correo") 
        {
            echo "<script>ohSnap('Debe colorcar su correo.', {color: 'orange '});$('#correo').focus();  </script>";
        }
    
        else if($_GET["info"]=="pass")
            {
             echo " <script> ohSnap('Debe colorcar su clave.', {color: 'orange '});$('#pass').focus();  </script> ";   
            } 
        else if($_GET["info"]=="false")     
        {
            echo "
                <script>
                    ohSnap('Usuario no registrado.', {color: 'red'});$('#pass').focus();
                </script>
            ";
        }
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
</body>
</html>