<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use View;
class con_opins extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function detalle_opin()
	{
		 

	}

	public function index()
	{
		 //".session()->get('id')."
		$vista="";
		//Consulta para saber si el usuario ya ha votado el opin o no
		$sql="SELECT count(t3.idUsuario) cantidad FROM PreguntaEncuesta t1
		INNER JOIN RespuestaEncuesta t2 ON t1.idPreguntaEncuesta = t2.idPreguntaEncuesta
		INNER JOIN SeleccionRespuestaEncuesta t3 ON t3.idRespuestaEncuesta = t2.idRespuestaEncuesta
		WHERE t1.idEncuesta = ".$_POST['id_form']." and t3.idUsuario=".session()->get('id')."";

		$votado=DB::select($sql);
		
		if($votado[0]->cantidad)
		{
			$vista=View::make('opinsvotados');
		}
		else
		{
			$vista=View::make('opins');
		}

		
		$sql="
		SELECT 
		t2.textoPregunta, 
		t1.fechaInicio,
		t1.fechaFin,
		t1.seleccionUnica,
		t1.numeroVotantes,
		t1.numeroFavoritos,
		t1.nombreFoto,
		t1.bloqueada,
		t1.publica,
		t1.seleccionUnica,
		t3.idUsuario as favorito 
		FROM Encuesta t1 
		INNER JOIN 
		PreguntaEncuesta t2 
		ON 
		t2.idEncuesta = t1.idEncuesta 
		LEFT JOIN FavoritoEncuesta t3 ON t3.idEncuesta = t1.idEncuesta and t3.idUsuario=".session()->get('id')."
		WHERE t1.idEncuesta=".$_POST['id_form']."";

		$datosuno=DB::select($sql);
		$vista->infouno=$datosuno;

		//Consulta para  obtener las preguntas
		$sql="SELECT  t2.idRespuestaEncuesta,t2.textoRespuesta,count(t3.idRespuestaEncuesta) as cantidad FROM PreguntaEncuesta t1
		INNER JOIN RespuestaEncuesta t2 ON t1.idPreguntaEncuesta = t2.idPreguntaEncuesta
        INNER JOIN SeleccionRespuestaEncuesta t3 ON t2.idRespuestaEncuesta =t3.idRespuestaEncuesta 
		WHERE t1.idEncuesta = ".$_POST['id_form']."
        GROUP BY t2.textoRespuesta
        order by count(t2.idRespuestaEncuesta) desc";		
		$preguntas=DB::select($sql);
		$vista->preguntas=$preguntas;



		return $vista;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function votado()
	{
		return View("opinsvotados");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
