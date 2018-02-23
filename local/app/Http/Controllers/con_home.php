<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Illuminate\Http\Request; 
use DB;
class con_home extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		try {
			$vista=View::make('index');
			$sql="SELECT count(*) as respuesta FROM seleccionrespuestaencuesta";
			$datos=DB::select($sql);
			$vista->respuesta=$datos;  

			$sql="SELECT numeroVotantes as masvotado FROM `encuesta` order BY numeroVotantes desc limit 0,1";
			$datos=DB::select($sql);
			$vista->masvotado=$datos;

			$sql="SELECT * FROM tematica order BY titulo asc ";
			$datos=DB::select($sql);
			$vista->tematica=$datos;

			$sql="SELECT count( t1.idEncuesta) as opins,t1.idUsuarioPropietario,if(t2.login is null,'Administrador',t2.login) as usuario,sum(t1.numeroVotantes) as total,if(t3.valor is null,0,t3.valor) puntos,t4.textoPregunta as pregunta FROM `encuesta` t1
				LEFT JOIN usuario t2 ON t2.idUsuario = t1.idUsuarioPropietario
				LEFT JOIN puntuacion t3 ON t3.idUsuario = t1.idUsuarioPropietario
				LEFT JOIN preguntaencuesta t4 ON t4.idEncuesta = t1.idEncuesta
				GROUP BY t1.idUsuarioPropietario limit 0,5";
			$datos=DB::select($sql);
			$vista->user_top=$datos;

			$sql="SELECT t1.numeroFavoritos, if(t4.login is null,'Administrador',t4.login) as login,t4.idUsuario, date_format(t1.fechaCreacion,'%d-%m-%Y') as fechaCreacion, t1.idEncuesta , t2.textoPregunta,t1.numeroVotantes FROM `encuesta` t1
			LEFT JOIN preguntaencuesta t2 ON t1.idEncuesta = t2.idPreguntaEncuesta
			LEFT JOIN usuario t4 ON t1.idUsuarioPropietario = t4.idUsuario
			order by t1.numeroVotantes desc LIMIT 0,5";
			$datos=DB::select($sql);
			$vista->topopin=$datos; 

			$sql="SELECT  t1.creadaPorAdministrador,numeroFavoritos as favorito,numeroVotantes, t1.nombreFoto as foto, t3.login, t1.idUsuarioPropietario, t1.idEncuesta,date_format(t1.fechaCreacion,'%d-%m-%Y') as fechaCreacion ,t2.textoPregunta from encuesta t1
			LEFT JOIN preguntaencuesta t2 ON t1.idEncuesta = t2.idEncuesta
			LEFT JOIN usuario t3 ON t1.idUsuarioPropietario = t3.idUsuario
			WHERE t1.publica = 1 AND t1.bloqueada = 0";
			$datos=DB::select($sql);
            $vista->opins=$datos;       
                
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
