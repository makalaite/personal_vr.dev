<?php namespace App\Http\Controllers;

use App\Models\VrOrder;
use App\Models\VrPages;
use App\Models\VrReservations;
use App\Models\VrUsers;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;

class VrOrderController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrorder
	 *
	 * @return Response
	 */
	public function index()
	{
	    $config['list'] = VrOrder::get()->toArray();
        $config['serviceTitle'] = trans('app.orders_list');
        $config['route'] = route('app.orders.create');

        $config['create'] = 'app.orders.create';
        $config['edit'] = 'app.orders.edit';
        $config['delete'] = 'app.orders.destroy';

        return view('admin.list', $config);
	}


	/**
	 * Show the form for creating a new resource.
	 * GET /vrorder/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $config = $this->getFormData();

        $config['serviceTitle'] = trans('app.orders_list');
        $config['route'] = route('app.orders.create');

        return view('admin.form', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrorder
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = request()->all();
        VrOrder::create($data);

        return redirect()->route('app.orders.index');
    }

	/**
	 * Display the specified resource.
	 * GET /vrorder/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /vrorder/{id}/edit
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
	 * PUT /vrorder/{id}
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
	 * DELETE /vrorder/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    private function getFormData()
    {
        $config['fields'][] = [
            "type" => "drop_down",
            "key" => "users",
            "options" => VrUsers::pluck('name', 'id')->toArray()
        ];

        $config['fields'][] = [
            "type" => "drop_down",
            "key" => "status",
            "options" => [
                "pending" => trans('app.pending'),
                "canceled" => trans('app.canceled'),
                "aproved" => trans('app.aproved'),
            ]
        ];
        return $config;
    }
}