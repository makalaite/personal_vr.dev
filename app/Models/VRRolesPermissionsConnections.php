<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRRolesPermissionsConnections extends Model
{
    public $updated_at = false;
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_roles_permissions_conn';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['permission_id', 'role_id'];
}
