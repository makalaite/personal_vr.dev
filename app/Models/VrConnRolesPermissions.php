<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VrConnRolesPermissions extends Model
{
    protected $updated_at = false;
    /**
     * $table name DataBases
     */
    protected $table = 'vr_connections_roles_permissions';

    /**
     * $fillable is table 'vr_connections_roles_permissions' fields
     */

    protected $fillable = ['role_id', 'permission_id'];
}
