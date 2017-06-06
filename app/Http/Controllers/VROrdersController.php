<?php namespace App\Http\Controllers;

use App\Models\VROrders;
use Illuminate\Routing\Controller;

class VROrdersController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /vrorders
     *
     * @return Response
     */
    public function adminIndex()
    {

    }

    public function getRoutesData()
    {

    }

    /**
     * Show the form for creating a new resource.
     * GET /vrorders/create
     *
     * @return Response
     */
    public function create()
    {
        return view('users.usersOrders');
    }

    /**
     * Store a newly created resource in storage.
     * POST /vrorders
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /vrorders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /vrorders/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrorders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /vrorders/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}