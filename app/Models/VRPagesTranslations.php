<?php

namespace App\Models;



class VrPagesTranslations extends CoreModel
{
    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_pages_translations';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'page_id', 'language_code', 'slug', 'title', 'description_short', 'description_long'];
}
