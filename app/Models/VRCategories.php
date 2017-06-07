<?php

namespace App\Models;



class VrCategories extends CoreModel
{
    use UuidTrait;

    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_categories';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'comment'];

}
