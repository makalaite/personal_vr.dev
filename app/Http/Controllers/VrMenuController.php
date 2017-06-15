<?php

namespace App\Http\Controllers;

use App\Models\VrMenuTranslations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VrMenu;
use Illuminate\Support\Facades\DB;
use Session;


class VrMenuController extends Controller
{

    public function frontendIndex()
    {

    }


    /**
     * Display a listing of the resource.
     * GET /vrmenu
     *
     * @return Response
     */
    public function index()
    {
        $config['list'] = VrMenu::get()->toArray();
        $config['title'] = trans('app.menu_list');
        $config['tableName'] = trans('app.menu_list');
        $config['create'] = 'app.menu.create';
        $config['edit'] = 'app.menu.edit';
        $config['delete'] = 'app.menu.destroy';

        return view('admin.list', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /vrmenu/create
     *
     * @return Response
     */
    public function create()
    {
        $config = $this->getFormData();

        $config['title'] = trans('app.menu_list');
        $config['route'] = route('app.menu.create');

        return view('admin.form', $config);
    }

    /**
     * Store a newly created resource in storage.
     * POST /vrmenu
     *
     * @return Response
     */


    public function store()
    {
        // dd($_POST);
        $data = request()->all();

        $record = VrMenu::create($data);

        $data['record_id'] = $record->id;
        VrMenuTranslations::create($data);

        return redirect()->route('app.menu.edit', $record->id);
    }

    /**
     * Display the specified resource.
     * GET /vrmenu/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * GET /vrmenu/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $record = VrMenu::find($id)->toArray();
        $config = $this->getFormData();
        dd($record);

        $config['title'] = trans('app.menu_list');
        $config['route'] = route('app.menu.create');

        return view('admin.form', $config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrmenu/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /vrmenu/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        VrMenuTranslations::destroy(VrMenuTranslations::where('record_id', $id)->pluck('id')->toArray());
        VrMenu::destroy($id);

        return ["success" => true, "id" => $id];
    }

    private function getFormData()
    {
        $lang = request('language_code');
        if ($lang == null)
            $lang = app()->getLocale();

        $config['fields'][] = [
            'type' => 'drop_down',
            'key' => 'language_code',
            'options' => getActiveLanguages()
        ];
        $config['fields'][] = [
            'type' => 'single_line',
            'key' => 'name',
        ];
        $config['fields'][] = [
            'type' => 'single_line',
            'key' => 'url',
        ];
        $config['fields'][] = [
            'type' => 'single_line',
            'key' => 'sequence',
        ];
        $config['fields'][] = [
            'type' => 'drop_down',
            'key' => 'vr_parent_id',
            'options' => VrMenuTranslations::get()
                ->where('language_code', $lang)
                ->pluck('name', 'record_id'),
        ];
        $config['fields'][] = [
            'type' => 'check_box',
            'key' => 'new_window',
            'options' => [
                ['label' => trans('app.yes'),
                    'name' => 'new_window',
                    'value' => 1], ['label' => trans('app.yes'),
                    'name' => 'new_window',
                    'value' => 1], ['label' => trans('app.yes'),
                    'name' => 'new_window',
                    'value' => 1],

            ]
        ];

        return $config;
    }
}