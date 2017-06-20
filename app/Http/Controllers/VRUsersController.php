<?php namespace App\Http\Controllers;

use App\Models\VrConnUserRoles;
use App\Models\VrRoles;
use App\Models\VrUsers;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

class VrUsersController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /vrusers
     *
     * @return Response
     */
    public function index()
    {
        $config['tableName'] = trans('app.users_list');
        $config['serviceTitle'] = trans('app.users');
        $config['list'] = VrUsers::get()->toArray();
        $config['route'] = route('app.users.create');
        $config['create'] = 'app.users.create';
        $config['edit'] = 'app.users.edit';
        $config['delete'] = 'app.users.destroy';

        return view('admin.list', $config);
    }


    /**
     * Show the form for creating a new resource.
     * GET /vrusers/create
     *
     * @return Response
     */
    public function create()
    {
        $config = $this->getFormData();

        $config['serviceTitle'] = trans('app.users');
        $config['route'] = route('app.users.create');
        $config['back'] = 'app.users.index';

        return view('admin.form', $config);
    }

    /**
     * Store a newly created resource in storage.
     * POST /vrusers
     *
     * @return Response
     */
    public function store()
    {
        $data = request()->all();
        $data['id'] = Uuid::uuid4();
        $data['password'] = bcrypt($data['password']);

        $record = VrUsers::create($data);

        $data['user_id'] = $record->id;
        VrConnUserRoles::create($data);

        return redirect()->route('app.users.edit', $record->id);
    }

    /**
     * Display the specified resource.
     * GET /vrusers/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * GET /vrusers/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $record = VrUsers::find($id)->toArray();
        $record['role_id'] = $record['rol']['role_id'];

        $config = $this->getFormData();

        $config['record'] = $record;
        $config['serviceTitle'] = $id;
        $config['route'] = route('app.users.edit', $id);

        return view('admin.form',$config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrusers/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $data = request()->all();

        $record = VrUsers::find($id);
        $record->update($data);

        $data['user_id'] = $id;

        VrConnUserRoles::updateOrCreate([
            'user_id' => $id,
            'role_id' => $data['role_id']
        ],$data);

        return redirect(route('app.users.edit', $record->id));
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /vrusers/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        VrConnUserRoles::where('user_id', $id)->delete();
        VrUsers::destroy($id);
        return ["success" => true, "id" => $id];
    }

    public function getFormData()
    {
        $config['fields'][] = [
            "type" => "single_line",
            "key" => "name"
        ];
        $config['fields'][] = [
            "type" => "single_line",
            "key" => "email"
        ];
        $config['fields'][] = [
            "type" => "single_line",
            "key" => "phone"
        ];
        $config['fields'][] = [
            "type" => "single_line",
            "key" => "password"
        ];
        $config['fields'][] = [
            'type' => 'drop_down',
            'key' => 'role_id',
            'options' => VrRoles::pluck('name', 'id')
        ];
        return $config;
    }

}