<?php namespace App\Http\Controllers;

use App\Models\VrReservations;
use DateTime;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

class VrReservationsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrreservations
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrreservations/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrreservations
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

    /**
     * Store a newly created resource in storage via VrOrdersController call
     *  POST
     *
     * @param formdata
     * @param order entry
     * @return void
     */
	public function storeFromOrder($experience, $record)
    {

    }

	/**
	 * Display the specified resource.
	 * GET /vrreservations/{id}
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
	 * GET /vrreservations/{id}/edit
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
	 * PUT /vrreservations/{id}
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
	 * DELETE /vrreservations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}