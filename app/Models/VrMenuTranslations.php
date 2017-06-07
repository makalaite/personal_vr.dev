<?php

namespace App\Models;



class VrMenuTranslations extends CoreModel
{
    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_menu_translations';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'name', 'url', 'menu_id', 'language_code'];
}
