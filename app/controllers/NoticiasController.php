<?php

class NoticiasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		return json_encode(Noticias::select("*", DB::raw("SUBSTRING(contenido,1,50) as 'cont'"))->orderby("updated_at","desc")->take(50)->get());
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
			$data = Input::all();
			$fecha = new Carbon();
			$fecha->setTimezone('America/Bogota');
			$data= array_add($data,'fecha',$fecha::now());

			if(Auth::user()->avatar != null)
				$imagen ="<img class='avatar circle' src='" . Auth::user()->avatar ."'/>";

			else
				$imagen ='  <i class="fa fa-2x fa-user"></i>';
			$data= array_add($data,'persona', Auth::user()->nombre . " de Residencia " . Residencias::find(Auth::user()->residencia_id)->nombre . $imagen);
			$data= array_add($data,'user_id', Auth::user()->id);
			$noticia = Noticias::create($data);
			return 	$noticia;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return json_encode(Noticias::orderby("updated_at","asc")->find($id));
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
		if(Auth::user()->id == Noticias::find($id)->user_id || Auth::user()->admin==1)
		{
			Noticias::destroy($id);
			return "true";
		}
		else {
			return "false";
		}
	}


}
