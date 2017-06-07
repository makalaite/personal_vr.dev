<?php

namespace App\Models;



class VrResources extends CoreModel
{
    use UuidTrait;

    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_resources';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'mime_type', 'path', 'width', 'size', 'height'];
}
