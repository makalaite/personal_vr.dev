<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRPagesResourcesConnections extends Model
{
    public $updated_at = false;
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_pages_resources_conn';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['page_id', 'resource_id'];
}
