<?php namespace App\Http\Controllers;

use App\Models\VrCategories;
use App\Models\VrCategoriesTranslations;
use App\Models\VrPages;
use App\Models\VrPagesTranslations;
use App\Models\VrResources;
use Illuminate\Routing\Controller;

class VrPagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrpages
	 *
	 * @return Response
	 */

	public function index()
    {
        $config['list'] = VrPages::get()->toArray();

        $config['serviceTitle'] = trans('app.pages');
        $config['tableName'] = trans('app.pages_list');
        $config['route'] = route('app.pages.create');

        $config['create'] = 'app.pages.create';
        $config['edit'] = 'app.pages.edit';
        $config['delete'] = 'app.pages.destroy';

        return view('admin.list', $config);
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /vrpages/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $config = $this->getFormData();
        $config['serviceTitle'] = trans('app.pages');
        $config['route'] = route('app.pages.create');

        return view('admin.form', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrpages
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = request()->all();

        $file = request()->file('file');

        $uploadController = new VrResourcesController();
        $record = $uploadController->upload($file);

        $data['cover_id'] = $record->id;
        $record = VrPages::create($data);

        $data['record_id'] = $record->id;
        VrPagesTranslations::create($data);

        return redirect(route('app.pages.edit', $record->id));
    }

	/**
	 * Display the specified resource.
	 * GET /vrpages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /vrpages/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $record = VrPages::find($id)->toArray();

        $record['slug'] = $record['translation']['slug'];
        $record['title'] = $record['translation']['title'];
        $record['description_short'] = $record['translation']['description_short'];
        $record['description_long'] = $record['translation']['description_long'];
        $record['language_code'] = $record['translation']['language_code'];

        $config = $this->getFormData();

        $config['record'] = $record;
        $config['titleForm'] = $id;
        $config['serviceTitle'] = $record['title'];
        $config['route'] = route('app.pages.edit', $id);
        $config['back'] = 'app.pages.index';

        return view('admin.form',$config);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /vrpages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $data = request()->all();

        $record = VrPages::find($id);
        $data['record_id'] = $id;

        VrPagesTranslations::updateOrCreate([
            'record_id' => $id,
            'language_code' => $data['language_code']
        ], $data);

        return redirect(route('app.pages.edit', $record->id));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vrpages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        VrPagesTranslations::destroy(VrPagesTranslations::where('record_id', $id)->pluck('id')->toArray());
        VrPages::destroy($id);
        return ["success" => true, "id" => $id];
	}

    public function getFormData()
    {
        $lang = request('language_code');
        if ($lang == null)
            $lang = app()->getLocale();
        $config['fields'][] = [
            "type" => "drop_down",
            "key" => "language_code",
            "options" => getActiveLanguages()
        ];
        $config['fields'][] = [
            "type" => "drop_down",
            "key" => "category_id",
            "options" => VrCategoriesTranslations::where('language_code', $lang)
                ->pluck('name','record_id')
        ];
        $config['fields'][] = [
            "type" => "single_line",
            "key" => "title"
        ];
        $config['fields'][] = [
            "type" => "textarea",
            "rows" => 2,
            "columns" => 40,
            "key" => "description_short"
        ];
        $config['fields'][] = [
            "type" => "textarea",
            "rows" => 8,
            "columns" => 40,
            "key" => "description_long"
        ];
        $config['fields'][] = [
            "type" => "single_line",
            "key" => "slug"
        ];
        $config['fields'][] = [
            "type" => "file",
            "key" => "cover_id",
            "file" => VrResources::pluck('path', 'id')->toArray()
        ];
        return $config;
    }
}