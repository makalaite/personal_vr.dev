<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRUsersRolesConnections extends Model
{

    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_users_roles_conn';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['user_id', 'role_id'];
}
