<?php

namespace App\Models;


class VRMenusTranslations extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_menus_translations';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'menu_id', 'language_id', 'name', 'slug'];
}

