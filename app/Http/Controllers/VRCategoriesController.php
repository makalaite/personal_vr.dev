<?php namespace App\Http\Controllers;

use App\Models\VrCategories;
use App\Models\VrCategoriesTranslations;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

class VrCategoriesController extends Controller
{


    /**
     * Display a listing of the resource.
     * GET /vrcategories
     *
     * @return Response
     *
     */
    public function adminIndex()
    {
        $config['title'] = trans('app.category_list');
        $config['list'] = VrCategories::get()->toArray();
        $config['create'] = 'app.categories.create';
        $config['tableName'] = trans('app.category_list');


        return view('admin.list', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /vrcategories/create
     *
     * @return Response
     */
    public function create()
    {
        $config = $this->getFormData();
        $config['title'] = trans('app.category_list');
        $config['create'] = 'app.categories.create';

        return view('admin.form', $config);
    }

    /**
     * Store a newly created resource in storage.
     * POST /vrcategories
     *
     * @return Response
     */
    public function store()
    {

        $record = VrCategories::create();

        $data = request()->all();

        $data['record_id'] = $record->id;

        VrCategoriesTranslations::create($data);

        return redirect()->route('app.categories.edit', $record->id);
    }

    /**
     * Display the specified resource.
     * GET /vrcategories/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * GET /vrcategories/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     * PUT /vrcategories/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /vrcategories/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

    private function getFormData()
    {
        $config['fields'][] = [
            'type' => 'drop_down',
            'key' => 'language_code',
            'options' => getActiveLanguages()
        ];
        $config['fields'][] = [
            'type' => 'single_line',
            'key' => 'name',
        ];

        return $config;
    }
}