<?php

namespace App\Models;

class VRLanguages extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_languages';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'name'];
}
