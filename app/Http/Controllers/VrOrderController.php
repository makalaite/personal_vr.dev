<?php namespace App\Http\Controllers;

use App\Models\VrOrder;
use App\Models\VrPages;
use App\Models\VrPagesTranslations;
use App\Models\VrReservations;
use App\Models\VrUsers;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;

class VrOrderController extends Controller
{

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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * GET /vrorder/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $record = VrOrder::find($id)->toArray();

        $config = $this->getFormData();

        $config['record'] = $record;
        $config['titleForm'] = $id;
        $config['route'] = route('app.orders.edit', $id);

        return view('admin.create', $config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrorder/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $data = request()->all();

        $record = VrOrder::find($id);
        $record->update($data);

        return redirect(route('app.orders.index'));
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /vrorder/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        VrOrder::destroy($id);
        return ["success" => true, "id" => $id];
    }

    private function generateDateRange()
    {
        $dates = [];

        for($date = Carbon::now(); $date->lte(Carbon::createFromDate()->addDay(14)); $date->addDay()) {
            $dates[$date->format('Y-m-d')] = $date->format('Y-m-d');
        }

        return $dates;
    }

    private function getRoomsWithCategory()
    {
        $p = VrPages::getTableName();
        $pt = VrPagesTranslations::getTableName();

        return VrPages::where('category_id', 'vr_rooms')->join($pt, "$pt.record_id", "=", "$p.id")->pluck("$pt.title", "$p.id")->toArray();

//        $r = VrPages::where('category_id', 'vr_rooms')->with(['translation']);
//        $t = VrPagesTranslations::pluck('title', 'id')->toArray();
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

        $config['fields'][] = [
            "type" => "drop_down",
            "key" => "time",
            "options" => $this->generateDateRange()
        ];

        $config['fields'][] = [
            "type" => "drop_down",
            "key" => "experience",
            "options" => $this->getRoomsWithCategory()
        ];

        return $config;
    }
}