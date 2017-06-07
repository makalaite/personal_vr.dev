<?php

namespace App\Models;



class VrCategoriesTranslations extends CoreModel
{

    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_categories_translations';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'name', 'language_code', 'category_id'];
}
