<?php

namespace App\Models;


class VRResources extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_resources';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'mime_type', 'path', 'size', 'width', 'height'];
}
