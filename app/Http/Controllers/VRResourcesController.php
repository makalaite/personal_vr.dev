<?php

namespace App\Http\Controllers;

use App\Models\VRResources;
use Carbon\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;


class VRResourcesController extends Controller {

    use ValidatesRequests;
	/**
	 * Display a listing of the resource.
	 * GET /resources
	 *
	 * @return mixed
	 */
	public function adminIndex()
	{

	}
    /**
     * Show the form for creating a new resource.
     * GET /resources/create
     *
     * @return Response
     */
    public function adminCreate()
    {

    }

        /**
         * Uploads file data
         * Creates generates file path
         *
         * @param UploadedFile $file
         * @return mixed
         */
        public function adminUpload(UploadedFile $file)
    {

    }
    /**
     * Store a newly created resource in storage.
     * POST /resources
     *
     * @return mixed
     */
    protected function adminStore()
    {

   }

	/**
	 * Display the specified resource.
	 * GET /resources/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminShow($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /resources/{id}
	 *
	 * @param  int  $id
	 * @return mixed
	 */
	public function adminDestroy($id)
	{

	}
}