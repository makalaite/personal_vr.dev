<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VrConnPagesResources extends Model
{
    /**
     * @var bool
     */
    protected $updated_at = false;

    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_connections_pages_resources';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['resource_id', 'page_id'];
}
