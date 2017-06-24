<?php namespace App\Http\Controllers;


use App\Models\VrPagesTranslations;
use Illuminate\Routing\Controller;

class FrontEndController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /frontend
     *
     * @return Response
     */
    public function index()
    {
        return view('user.frontEnd');
    }

    public function showPage($lang, $slug)
    {

        $data = VrPagesTranslations::where('language_code', $lang)->where('slug', $slug)->with('page')->first()->toArray();
        dd($data);
        return view('user.pages', $data);

    }


}