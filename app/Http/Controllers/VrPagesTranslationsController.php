<?php namespace App\Http\Controllers;

use App\Models\VrPagesTranslations;
use Illuminate\Routing\Controller;

class VrPagesTranslationsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrpagestranslations
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrpagestranslations/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrpagestranslations
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

    public function storeFromVrPagesController($data, $article)
    {

     }

	/**
	 * Display the specified resource.
	 * GET /vrpagestranslations/{id}
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
	 * GET /vrpagestranslations/{id}/edit
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
	 * PUT /vrpagestranslations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	public function updateFromVrPagesController($data, $id)
    {

    }
	/**
	 * Remove the specified resource from storage.
	 * DELETE /vrpagestranslations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}