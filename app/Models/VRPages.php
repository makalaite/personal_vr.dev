<?php

namespace App\Models;


class VRPages extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_pages';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'category_id', 'resource_id'];


    /**
     * Returns one translation info
     * according to locale language
     * @return mixed
     *
     */
}

