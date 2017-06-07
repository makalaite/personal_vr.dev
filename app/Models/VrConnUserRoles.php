<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VrConnUserRoles extends Model
{
    protected $updated_at = false;
    /**
     * $table name DataBases
     */
    protected $table = 'vr_connections_users_roles';

    /**
     * $fillable is table 'vr_connections_users_roles' fields
     */

    protected $fillable = ['user_id', 'role_id'];
}
