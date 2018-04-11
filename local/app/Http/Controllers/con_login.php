<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use View;
use Mail;
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

	public function recuperar()
	{
		 $sql="SELECT *,count(idUsuario) as contador FROM Usuario WHERE email='".$_POST['correo']."'";
		 	try {
                 $datos=DB::select($sql);
                 if($datos[0]->contador)
          		 {
          		 	if($datos[0]->estado==0)
          		 	{
          		 		echo 0; // el usuario esta inactivo 
          		 	}
          		 	else
          		 	{
          		 		 $aleratorio=rand(900000,999999);
          		 		 $data=[
						'name'=>$datos[0]->login,
						'clave'=>$aleratorio
						];
						try {
							$sql="UPDATE Usuario SET clave='".hash('sha256',$aleratorio)."' WHERE login ='".$datos[0]->login."'";
							DB::update($sql);  
							Mail::send("email.recuperar", $data, function ($message){
							$message->to($_POST['correo']);
							$message->from("no-reply@opinion-app.com");
						    $message->subject("no-reply@opinion-app.com"); 
							});
							echo 1;
						} catch (Exception $e) {
							echo 4;
						}
          		 	}
          		 }
          		 else
          		 {
          		 	echo 2; //el usuario no esta registrado
          		 }
            } catch (QueryException $e) {
            	return Redirect('error');
            } 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create( Request $request)
	{
		 
		 $datos="";
		 if($_POST['correo']==""){return Redirect('iniciar?info=correo');exit();}
		 if($_POST['pass']==""){return Redirect('iniciar?info=pass');exit();}
		 $sql="
		 SELECT idUsuario, login, email, clave,COUNT(idUsuario) AS contador 
		 FROM Usuario 
		 WHERE (email = '".$_POST['correo']."' OR  login = '".$_POST['correo']."') AND clave ='".hash('sha256', $_POST['pass'])."'";
		 
		 	try {
                 $datos=DB::select($sql);
            } catch (QueryException $e) {
            	return Redirect('error');
            } 

          if($datos[0]->contador)
          {

          	 $sql="
				 SELECT estado,COUNT(estado) AS contador 
				 FROM Usuario 
				 WHERE (email = '".$_POST['correo']."' 
				 OR  login = '".$_POST['correo']."') 
				 AND clave ='".hash('sha256', $_POST['pass'])."'";				 
				 	try {
		                $datos2=DB::select($sql);
		                if($datos2[0]->estado==1)
          				{
          					$request->session()->set('correo', $datos[0]->email);
				            $request->session()->set('nombre', $datos[0]->login);
				            $request->session()->set('id', $datos[0]->idUsuario);
				             $request->session()->set('tipo', 'user');
				            return Redirect('inicio');
          				}
          				else
          				{
          					return Redirect('iniciar?activate=false');
          				}
		                
		            } catch (QueryException $e) {
		            	return Redirect('error');
		            } 
          	
          }
          else
          {
          	 $sql="
			 SELECT idAdministrador, login, clave,COUNT(idAdministrador) AS contador 
			 FROM Administrador 
			 WHERE  login = '".$_POST['correo']."' AND clave ='".hash('sha256', $_POST['pass'])."'";
			 
		 	try {
                 $datos=DB::select($sql);
                  if($datos[0]->contador)
			          { 
			          	 $sql="
							 SELECT *, COUNT(idAdministrador) AS contador 
							 FROM Administrador 
							 WHERE (login = '".$_POST['correo']."') 
							 AND clave ='".hash('sha256', $_POST['pass'])."'";				 
							 	try {
					                $datos2=DB::select($sql);
					                
			          					$request->session()->set('correo', $datos[0]->login);
							            $request->session()->set('nombre', $datos[0]->login);
							            $request->session()->set('id', $datos[0]->idAdministrador);
							            $request->session()->set('tipo', 'admin');
							            return Redirect('inicio'); 					                
					            } catch (QueryException $e) {
					            	return Redirect('error');
					            } 
			          	
			          }
			          else
			          {
			          	return Redirect('iniciar?info=false');
			          }
            } catch (QueryException $e) {
            	return Redirect('error');
            } 
          	 
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
		 $request->session()->forget('tipo');  
        return redirect('/');
	}
}
