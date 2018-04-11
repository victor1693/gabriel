<?php
	
			//Números de opins 
			$sql="SELECT count(*) as total FROM Encuesta";
			$datos=DB::select($sql);
			$vista->opinstotal=$datos;
			//Números de opins publicos 
			$sql="SELECT count(*) as total FROM Encuesta where publica = 1";
			$datos=DB::select($sql);
			$vista->opinspublicos=$datos;

			//Números de usuarios activos
			$sql="SELECT count(*) as total FROM Usuario where estado = 1";
			$datos=DB::select($sql);
			$vista->usuariosactivos=$datos;
			
 			//Números de opiniones
			$sql="SELECT count(*) as respuesta FROM SeleccionRespuestaEncuesta";
			$datos=DB::select($sql);
			$vista->respuesta=$datos;  

			//Números de opiniones privadas
			$sql="SELECT count(t4.idseleccionRespuestaEncuesta) as total FROM Encuesta t1
				INNER JOIN PreguntaEncuesta t2 ON t1.idEncuesta= t2.idEncuesta
				INNER JOIN RespuestaEncuesta t3 ON t3.idPreguntaEncuesta=t2.idpreguntaEncuesta
				INNER JOIN SeleccionRespuestaEncuesta t4 ON t4.idrespuestaEncuesta =t3.idrespuestaEncuesta
				WHERE t1.publica = 0"; 
			$datos=DB::select($sql);
			$vista->totalopinionesprivadas=$datos;   

			//Números de opiniones privadas
			$sql="SELECT count(t4.idseleccionRespuestaEncuesta) as total FROM Encuesta t1
				INNER JOIN PreguntaEncuesta t2 ON t1.idEncuesta= t2.idEncuesta
				INNER JOIN RespuestaEncuesta t3 ON t3.idPreguntaEncuesta=t2.idpreguntaEncuesta
				INNER JOIN SeleccionRespuestaEncuesta t4 ON t4.idrespuestaEncuesta =t3.idrespuestaEncuesta
				WHERE t1.publica = 1"; 
			$datos=DB::select($sql);
			$vista->totalopinionespublicas=$datos;

			$sql="SELECT numeroVotantes as masvotado FROM Encuesta order BY numeroVotantes desc limit 0,1";
			$datos=DB::select($sql);
			$vista->masvotado=$datos;

			$sql="SELECT * FROM Tematica order BY titulo asc ";
			$datos=DB::select($sql);
			$vista->tematica=$datos;

			$sql="SELECT count( t1.idEncuesta) as opins,t1.idUsuarioPropietario,if(t2.login is null,'Administrador',t2.login) as usuario,sum(t1.numeroVotantes) as total,if(t3.valor is null,0,t3.valor) puntos,t4.textoPregunta as pregunta FROM Encuesta t1
				LEFT JOIN Usuario t2 ON t2.idUsuario = t1.idUsuarioPropietario
				LEFT JOIN Puntuacion t3 ON t3.idUsuario = t1.idUsuarioPropietario
				LEFT JOIN PreguntaEncuesta t4 ON t4.idEncuesta = t1.idEncuesta
				GROUP BY t1.idUsuarioPropietario limit 0,5";
			$datos=DB::select($sql);
			$vista->user_top=$datos;

			$sql="SELECT t1.numeroFavoritos, if(t4.login is null,'Administrador',t4.login) as login,t4.idUsuario, date_format(t1.fechaCreacion,'%d-%m-%Y') as fechaCreacion, t1.idEncuesta , t2.textoPregunta,t1.numeroVotantes, t1.fechaFin,t1.seleccionUnica,t1.publica FROM `Encuesta` t1
			LEFT JOIN PreguntaEncuesta t2 ON t1.idEncuesta = t2.idpreguntaEncuesta
			LEFT JOIN Usuario t4 ON t1.idUsuarioPropietario = t4.idUsuario
			order by t1.numeroVotantes desc LIMIT 0,5";
			$datos=DB::select($sql);
			$vista->topopin=$datos;   
?>