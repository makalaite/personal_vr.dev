<?php

namespace App\Models;


class VrPages extends CoreModel
{

    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_pages';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'category_id', 'cover_id'];

    protected $with = ['translation'];

    public function translation()
    {

        $lang = request('language_code');
        if ($lang == null)
            $lang = app()->getLocale();

        return $this->hasOne(VrPagesTranslations::class, 'record_id', 'id')
            ->where('language_code', $lang);
    }
}
