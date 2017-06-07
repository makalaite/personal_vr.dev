<?php

namespace App\Models;

class VrRoles extends CoreModel
{
    /**
     * $table name DataBases
     */
    protected $table = 'vr_roles';

    /**
     * $fillable is table 'vr_roles' fields
     */

    protected $fillable = ['id', 'name'];

}
