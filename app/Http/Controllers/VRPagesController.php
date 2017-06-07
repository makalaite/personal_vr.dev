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
        $dataFromModel = new VrPages;
        $config = $this->listBladeData();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['list'] = $dataFromModel->with(['translation', 'category', 'resource'])->get()->toArray();

        if($config['list'] == null )
        {
            return redirect()->route('app.pages.create', $config);
        }
        $config['ignore'] = ['id', 'page_id'];
//        dd($config);
        return view('admin.listView', $config);
	}

	public function indexFrontEnd($slug)
    {
        $config = [];
        return view ('frontEnd.pagesSingle', $config);
    }

    public function indexFrontEndEn($slug)
    {
        $config['item'] = VrPagesTranslations::where('slug', '=', $slug)->get()->toArray();
//        dd($config);
        return view ('frontEnd.pagesSingle', $config);
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /vrpages/create
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrpages
	 *
	 * @return Response
	 */
	public function store()
	{

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

	}

    private function listBladeData()
    {

    }
}