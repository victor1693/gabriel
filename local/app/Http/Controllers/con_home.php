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
	 	$sql="";
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

			if($_POST["vista"]==1)
			{
				$sql="SELECT  t1.creadaPorAdministrador,numeroFavoritos as favorito,numeroVotantes, t1.nombreFoto as foto, t3.login, t1.idUsuarioPropietario, t1.idEncuesta,date_format(t1.fechaCreacion,'%d-%m-%Y') as fechaCreacion ,t2.textoPregunta,t1.idTematica,t1.fechaFin,t1.seleccionUnica from Encuesta t1
				LEFT JOIN PreguntaEncuesta t2 ON t1.idEncuesta = t2.idEncuesta
				LEFT JOIN Usuario t3 ON t1.idUsuarioPropietario = t3.idUsuario
				WHERE  t2.textoPregunta like '%".$_POST['fbuscar']."%'  AND t1.publica = 1 AND t1.bloqueada = 0 ".$categoria."
				".$order."
				";
			}
			else if($_POST["vista"]==2)
			{
				$sql="SELECT  t1.creadaPorAdministrador,numeroFavoritos as favorito,numeroVotantes, t1.nombreFoto as foto, t3.login, t1.idUsuarioPropietario, t1.idEncuesta,date_format(t1.fechaCreacion,'%d-%m-%Y') as fechaCreacion ,t2.textoPregunta,t1.idTematica,t1.fechaFin,t1.seleccionUnica from Encuesta t1
				LEFT JOIN PreguntaEncuesta t2 ON t1.idEncuesta = t2.idEncuesta
				LEFT JOIN Usuario t3 ON t1.idUsuarioPropietario = t3.idUsuario
				WHERE  t2.textoPregunta like '%".$_POST['fbuscar']."%'  AND t1.publica = 1 AND t1.bloqueada = 0 and t1.idUsuarioPropietario=".session()->get("id")." ".$categoria."
				".$order."
				";
			}
			 
		 	$datos=DB::select($sql);
			echo json_encode($datos);
	}

	public function index()
	{
		try { 
			$vista=View::make('index');
			include("local/resources/views/queries/sql_opinions.php");            
            return $vista;
		} catch (Exception $e) {
			return Redirect('error'); 
		}
	}

	public function index_myopins()
	{
		try {

			$vista=View::make('myopin');
			include("local/resources/views/queries/sql_opinions.php");            
            return $vista;
		} catch (Exception $e) {
			return Redirect('error'); 
		}
	}

		public function index_favorites()
	{
		try {

			$vista=View::make('favorites');
			include("local/resources/views/queries/sql_opinions.php");            
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
