<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
                <title>
                    OpinionApp
                </title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
                    <!-- Bootstrap 3.3.7 -->
                    <?php include('local/resources/views/includes/referencias_top.html');?> 
            </meta> 
        <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
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
                    <div class="row">
                        <div class="col-sm-12 text-center" style="padding: 0px; margin-bottom: 15px;">
                             
                            <a class="btn btn-app " style="height: 70px;padding-top: 5px;">
                                <span style="font-size: 12px;">
                                    <strong>
                                        Nº Respuestas
                                        <br>
                                            Obtenidas
                                        </br>
                                    </strong>
                                    <span style="font-size: 18px;">
                                        <?php echo $respuesta[0]->respuesta?>
                                    </span>
                                </span>
                            </a>
                            <a class="btn btn-app " style="height: 70px;padding-top: 5px;">
                                <span style="font-size: 12px;">
                                    <strong>
                                        Opin
                                        <br>
                                            Mas votado
                                        </br>
                                    </strong>
                                    <span style="font-size: 18px;">
                                     <?php echo $masvotado[0]->masvotado?>
                                    </span>
                                </span>
                            </a>
                            <a class="btn btn-app " style="height: 70px;padding-top: 5px;">
                                <span style="font-size: 12px;">
                                    <strong>
                                        Nº Follower
                                        <br>
                                        </br>
                                    </strong>
                                    <span style="font-size: 18px;">
                                       0
                                    </span>
                                </span>
                            </a>
                            <a class="btn btn-app " style="height: 70px;padding-top: 5px;">
                                <span style="font-size: 12px;">
                                    <strong>
                                        Nº Siguiendo
                                        <br>
                                        </br>
                                    </strong>
                                    <span style="font-size: 18px;">
                                        0
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12" style="padding: 0px;padding-right: 10px;">
                            <div class="col-sm-9" style="padding: 0px;">
                                <div class="col-sm-12">
                                    <div class="col-sm-6 sp text-center">
                                        <input onkeyup="filtrar(this.value,'','','','fecha')" id="buscador" class="form-control" name="buscar" placeholder="Buscador" type="text">
                                        </input>
                                    </div>
                                    <div class="col-sm-3 sp text-center">
                                        <span style="font-size: 24px;">
                                            Opins Públicos
                                        </span>
                                    </div>
                                    <div class="col-sm-3 sp text-center">
                                        <button class="btn btn-sm btn-info" onClick="setVotos()">
                                            Votos
                                            <i id="btn_votos" class="fa fa-arrow-circle-up"></i>


                                        </button>
                                        <button class="btn btn-sm btn-info" onClick="setFecha()">
                                            Fecha
                                            <i id="btn_fecha" class="fa fa-arrow-circle-up"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-xs-12 sp text-center" style="background-color: #e8e8e8;padding-top: 10px;padding-bottom: 10px;margin-top: 5px;z-index: 1;">
                                    <a class="menu-op" onClick="setCategoria(0)">
                                        Todas
                                    </a>
                                    <?php foreach ($tematica as $key ) {
                                    echo '<a class="menu-op" onClick="setCategoria('.$key->idTematica.')">'.$key->titulo.'</a>';
                                    }?>
                                </div>
                                <div class="col-sm-12"><img src="">
                                    <div class="box">
                                        <table class="table table-condensed .table-hover" style="margin-top: 6px;">
                                            <tbody id="tabla_opins">
                                                                                       
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 text-center" style="padding: 0px; ">
                                <div class="col-xs-12" style="padding: 0px;">
                                    <div class="box" style="padding-top: 8px;">
                                        <span style="font-size: 16px;">
                                            Opin más votados
                                        </span>
                                        <table class="table table-condensed .table-hover" style="margin-top: 6px;">

                                            <tbody>
                                            <?php

                                            $contador=0;
                                                foreach ($topopin as $key) {
                                                    $contador++;
                                                $publica="";
                                                $su="";
                                                $fechaFin="";
                                                if($key->publica)
                                                {
                                                    $publica='<img src="local/resources/views/img/open.png" style="width:12px;margin-left:8px;">';
                                                }
                                                 if($key->seleccionUnica)
                                                {
                                                    $su='<i style="margin-left:10px;" class="fa  fa-check-square"></i>';
                                                }
                                                 if($key->fechaFin!=null)
                                                {
                                                    $fechaFin='<i style="color:#8e0015;margin-right:5px;" class="fa fa-flag"></i> '.$key->fechaFin.'';
                                                }
                                                echo '<tr>
                                                    <td style="width: 20px;padding-top: 15px;">
                                                        '.$contador.'
                                                    </td>
                                                    <td>
                                                        <div class="text-left" style="font-size: 10px;">
                                                            <strong>
                                                                '.$key->textoPregunta.'
                                                            </strong>
                                                        </div>
                                                        <div class="text-left" style="font-size: 12px;padding-top: 5px;">
                                                            <span> 
                                                                <i style="margin-right:5px;color:#006804;" class="fa fa-flag"></i> '.$key->fechaCreacion.' 
                                                            </span>
                                                             <span> 
                                                                <span style="padding-left: 10px;">
                                                                   <i id="votados_'.$key->idEncuesta.'" class="fa fa-fw fa-heart"><span style="margin-left:5px;color:#000;">'.$key->numeroFavoritos.'</span></i>
                                                                </span>
                                                                <span style="padding-left: 15px;">
                                                                  <i class="ion ion-stats-bars"><span style="margin-left:5px;">'.$key->numeroVotantes.'</span></i>
                                                                </span>
                                                                <span>'.$su.'</span>
                                                                '.$publica.'

                                                            </span> 
                                                        </div> 
                                                         <div class="text-left" style="font-size: 12px;">
                                                               '.$fechaFin.'
                                                        </div> 
                                                    </td>
                                                </tr>'; 

                                                }
                                            ?>
                                                
                                                 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--Usuarios Top-->
                                <div class="col-xs-12" style="padding: 0px;">
                                    <div class="box" style="padding-top: 8px;">
                                        <span style="font-size: 16px;">
                                            Usuarios Top
                                        </span>
                                        <table class="table table-condensed .table-hover" style="margin-top: 6px;">
                                            <tbody>
                                                
                                                <?php 
                                                $contador=0;
                                                    foreach ($user_top as $key ) {
                                                        $contador++;
                                                        echo '<tr><td style="width: 20px;padding-top: 15px;">
                                                            '.$contador.'
                                                        </td>
                                                        <td>
                                                            <div class="text-left" style="font-size: 10px;">
                                                                <a class=" " href="#" style="text-decoration: underline;">
                                                                    <strong>
                                                                      '.$key->usuario.'
                                                                    </strong>
                                                                </a>
                                                            </div>
                                                            <div class="text-left" style="font-size: 10px;padding-top: 5px;">
                                                                <span>
                                                                    '.$key->puntos.' Pts | '.$key->opins.' Opins | '.$key->total.' Respuestas
                                                                </span>
                                                            </div>
                                                        </td> </tr> ';
                                                    }
                                                ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

<style type="text/css">
    .favoritoUser
    {
        color: #c12600;
         
    }
</style>>
<!-- /.content -->
<!-- /.content-wrapper -->
<?php //include('includes/footer.php');?>
<div class="control-sidebar-bg">
</div>
<?php include('local/resources/views/includes/referencias_down.php');?>
 
<script type="text/javascript">
intervalo=1000;
bcategoria=0;
bvotos=0;
bfecha=0;
bfiltro="fecha";
baderaFecha=0;
baderaVotos=0; 
$(document).ready(function() { 
filtrar("",bvotos,bfecha,bfiltro,bcategoria)
}); 


 
 

function filtrar(buscar,votos,fecha,filtro,categoria)
{
     if(votos=="" && fecha==""){votos=bvotos;fecha=bfecha;} 
     $("#tabla_opins").html("");
     $("#tabla_opins").empty();
     generar_opins(buscar,votos,fecha,bfiltro,bcategoria);
}

function setVotos()
{
     if(bvotos==0)
     {
     $("#btn_votos").removeClass("fa fa-arrow-circle-up");
     $("#btn_votos").addClass("fa fa-arrow-circle-down");
     bvotos=1;
     }
     else
     {
    $("#btn_votos").removeClass("fa fa-arrow-circle-down");
    $("#btn_votos").addClass("fa fa-arrow-circle-up");
        bvotos=0;
     } 
     $("#btn_fecha").removeClass("fa fa-arrow-circle-down");
     $("#btn_fecha").addClass("fa fa-arrow-circle-up");   
     bfiltro="votos";
     bfecha=0;
     filtrar($("#buscador").val(),bvotos,bfecha,bfiltro,bcategoria)
}
function setFecha()
{
     if(bfecha==0)
    {
    $("#btn_fecha").removeClass("fa fa-arrow-circle-up");
    $("#btn_fecha").addClass("fa fa-arrow-circle-down");
    bfecha=1;
    }
    else
    {
    $("#btn_fecha").removeClass("fa fa-arrow-circle-down");
    $("#btn_fecha").addClass("fa fa-arrow-circle-up");
    bfecha=0;
    }  
     bfiltro="fecha";
     bvotos=0; 
     $("#btn_votos").removeClass("fa fa-arrow-circle-down");
     $("#btn_votos").addClass("fa fa-arrow-circle-up");
     filtrar($("#buscador").val(),bvotos,bfecha,bfiltro,bcategoria)
}
function setCategoria(valor)
{
     bcategoria=valor;
     filtrar($("#buscador").val(),bvotos,bfecha,bfiltro,bcategoria)
}
function validar_favoritos()
    {    
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });  
        $.ajax({
            url: 'validaropin',
            type: 'post',
            dataType:"json",   
            success: function(data)  
            { 

                  $.each(data, function(i, datos) {
                    $("#votados_"+datos['idEncuesta']).addClass("favoritoUser");
                    $("#"+datos['idEncuesta']).addClass("favoritoUser");                        
                  });
            }
               
        })
    } 

    function generar_opins(buscar,votos,fecha,filtro,categoria)
    {   
        $("#tabla_opins").empty(); 
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });  
        $.ajax({
            url: 'listaropins',
            type: 'post',
            dataType:"json", 
            data:{fbuscar:buscar,fvotos:votos,ffecha:fecha,ffiltro:filtro,fcategoria:categoria},
            success: function(data)  
            {
           
             columna="";
                $.each(data, function(i, datos) {  
                    usuario="Administrador";
                    carpeta="0";
                    imagen="0.png";
                    seleccionUnica="";
                    fechaFin="";
                    baderaVerde='<i style="margin-right:5px;color:#006804;" class="fa fa-flag"></i>';
                    baderaRoja='<i style="margin-right:5px;color:#8e0015;" class="fa fa-flag"></i>';
                        if(datos["login"]!=null)
                        {
                            usuario=datos["login"];
                        }
                        if(datos["seleccionUnica"]==1)
                        {
                            seleccionUnica='<i style="margin-left:10px;" class="fa  fa-check-square"></i>';
                        }
                        if(datos["fechaFin"]!=null)
                        {
                           fechaFin=baderaRoja+datos["fechaFin"];
                        }
                                                            
                        carpeta=datos["idEncuesta"];
                        imagen=datos["foto"];
                        if(datos["foto"]==null)
                        {
                        carpeta="0";
                        imagen="0.png";
                        }
                     columna=columna+'<tr> <td style="width: 30px;padding-left: 5px;"> <img class="img-circle" style="width:30px;" src="local/resources/views/uploads/encuestas/'+carpeta+'/'+imagen+'"> </td> <td> <div class="text-left" style="font-size: 12px;"> <strong> '+datos["textoPregunta"]+'</strong> </div> <div class="text-left" style="font-size: 12px;padding-top: 2px;"> <span> '+baderaVerde+datos["fechaCreacion"]+' '+seleccionUnica+' <span style="padding-left: 15px;margin-top"> <i id="'+datos["idEncuesta"]+'" class="fa fa-fw fa-heart"><span  style="margin-left:5px;color:#000;">'+datos["favorito"]+'</span></i> </span> <span style="padding-left: 20px;"> <i class="ion ion-stats-bars"><span style="margin-left:5px;">'+datos["numeroVotantes"]+'</span></i></span> <i style="margin-left:10px;"> <img src="local/resources/views/img/open.png" style="width:15px;"> </i> </span> <a class="pull-right" href="'+datos["idUsuarioPropietario"]+'" style="text-decoration: underline;"> <strong> '+usuario+' </strong> </a> <br/>'+fechaFin+'</div> </td> </tr>';    
                });
                $("#tabla_opins").html("");
                $("#tabla_opins").html(columna);
                validar_favoritos();
            }
               
        })
    }
    
</script>
 

    </body>
</html>

