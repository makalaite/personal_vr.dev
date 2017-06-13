<?php namespace App\Http\Controllers;

use App\Models\VrCategoriesTranslations;
use Illuminate\Routing\Controller;

class VrCategoriesTranslationsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrcategoriestranslations
	 *
	 * @return Response
	 */
	public function index()
	{
        $config['edit'] = 'app.categories.edit';
        $config['delete'] = 'app.categories.destroy';
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrcategoriestranslations/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrcategoriestranslations
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

    /**
     * Store a newly created resource in storage.
     * POST /vrcategoriestranslations
     *
     * @return Response
     */
    public function storeFromVrCategoriesController($data, $record)
    {

    }

	/**
	 * Display the specified resource.
	 * GET /vrcategoriestranslations/{id}
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
	 * GET /vrcategoriestranslations/{id}/edit
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
	 * PUT /vrcategoriestranslations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

    public function updateFromVrCategoriesController($data, $record)
    {

    }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vrcategoriestranslations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}

}