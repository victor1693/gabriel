<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Illuminate\Http\Request; 
use DB;
class con_home extends Controller {

	
	public function validar_votados() //saber si el opin fue votado por el usuario logueado 
	{
		$sql="SELECT * from FavoritoEncuesta WHERE idUsuario= ".session()->get('id')." ";
		$datos=DB::select($sql); 
		echo json_encode($datos); 
	}

	public function ajax_listar_opins() //listar todos los opins
	{
		
		$order=""; 
	 
			if($_POST['ffiltro']=="votos")
			{
				if($_POST['fvotos']==1){$order=" order by t1.numeroVotantes desc";}
				else{$order=$order." order by  t1.numeroVotantes asc";}
			}
			else
			{
				if($_POST['ffecha']==1){$order="  order by t1.fechaInicio desc";}
				else{$order=$order."  order by t1.fechaInicio asc";}
			} 

	  		$categoria="";
	  	 	
	  		 
	  		if($_POST['fcategoria']!=0)
			{
				 $categoria=" AND t1.idTematica =".$_POST['fcategoria']." ";
			}
			else
			{
				 $categoria="";
			} 

			$sql="SELECT  t1.creadaPorAdministrador,numeroFavoritos as favorito,numeroVotantes, t1.nombreFoto as foto, t3.login, t1.idUsuarioPropietario, t1.idEncuesta,date_format(t1.fechaCreacion,'%d-%m-%Y') as fechaCreacion ,t2.textoPregunta,t1.idTematica,t1.fechaFin,t1.seleccionUnica from Encuesta t1
				LEFT JOIN PreguntaEncuesta t2 ON t1.idEncuesta = t2.idEncuesta
				LEFT JOIN Usuario t3 ON t1.idUsuarioPropietario = t3.idUsuario
				WHERE  t2.textoPregunta like '%".$_POST['fbuscar']."%'  AND t1.publica = 1 AND t1.bloqueada = 0 ".$categoria."
				".$order."
				";

		 	$datos=DB::select($sql);
			echo json_encode($datos);
	}

	public function index()
	{
		try {
			$vista=View::make('index');
			$sql="SELECT count(*) as respuesta FROM SeleccionRespuestaEncuesta";
			$datos=DB::select($sql);
			$vista->respuesta=$datos;  

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
			LEFT JOIN PreguntaEncuesta t2 ON t1.idEncuesta = t2.idPreguntaEncuesta
			LEFT JOIN Usuario t4 ON t1.idUsuarioPropietario = t4.idUsuario
			order by t1.numeroVotantes desc LIMIT 0,5";
			$datos=DB::select($sql);
			$vista->topopin=$datos;   
                 return $vista;
		} catch (Exception $e) {
			return Redirect('error'); 
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
