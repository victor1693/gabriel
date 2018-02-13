<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use View;
class con_login extends Controller {

	/**
	 * Display a listing of the resource.
	 *ñ
	 * @return Response
	 */
	public function index()
	{
		return View('login');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create( Request $request)
	{
		$datos="";
		 if(!isset($_POST['correo'])){return Redirect('reguser?error=correo');}
		 if(!isset($_POST['pass'])){return Redirect('reguser?error=pass');}
		 $sql="
		 SELECT idUsuario, login, email, clave,COUNT(idUsuario) AS contador 
		 FROM usuario 
		 WHERE email = '".$_POST['correo']."' OR  login = '".$_POST['correo']."' AND clave ='".md5($_POST['pass'])."'";
		 
		 	try {
                 $datos=DB::select($sql);
            } catch (QueryException $e) {
            	return Redirect('error');
                //dd("Error: ".$e->getMessage());
            }
          if($datos[0]->contador)
          {
          	$request->session()->set('correo', $datos[0]->email);
            $request->session()->set('nombre', $datos[0]->login);
            $request->session()->set('id', $datos[0]->idUsuario);
            return Redirect('inicio');
          }
          else
          {
          	 return Redirect('inicio?v=false');
          }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function salir(Request $request)
	{
		$request->session()->forget('correo');
		$request->session()->forget('id');
		$request->session()->forget('nombre');    
        return redirect('/');
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
