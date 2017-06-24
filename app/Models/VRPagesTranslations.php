<?php

namespace App\Models;



class VrPagesTranslations extends CoreModel
{
    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_pages_translations';
    protected $fillable = ['id', 'record_id', 'language_code', 'slug', 'title', 'description_short', 'description_long'];

    /**
     * Fillable column names
     * @var array
     */

    public function page()
    {
        return $this->hasOne(VrPages::class,'id', 'record_id');
    }
}
