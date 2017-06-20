<?php namespace App\Http\Controllers;

use App\Models\VrResources;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;

class VrResourcesController extends Controller {

    public function upload(UploadedFile $file)
    {
        $data =
            [
                "size" => $file->getsize(),
                "mime_type" => $file->getMimetype(),
            ];
        $path = 'upload/' . date ("Y/m/d/");
        $fileName = Carbon::now()->timestamp . '-' .$file->getClientOriginalName();
        $file->move(public_path($path), $fileName);
        $data["path"] = $path . $fileName;
        return VrResources::create($data);
    }
	/**
	 * Display a listing of the resource.
	 * GET /vrresources
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrresources/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrresources
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /vrresources/{id}
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
	 * GET /vrresources/{id}/edit
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
	 * PUT /vrresources/{id}
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
	 * DELETE /vrresources/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}