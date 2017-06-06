<?php

namespace App\Models;


class VRMenus extends CoreModel

{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_menus';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'new_window', 'sequence', 'parent'];

    /**
     * Returns menus translations data
     * @return mixed
     *
     */


    /**
     * Returns menu translations data
     * where language_id is the same as
     * 5th segment of url
     * @return mixed
     */


    /**
     * Returns menu translations data
     * where language_id is the same as
     * locale language
     * @return mixed
     */


    /**
     * Returns menu data where
     * menus have a parent menu
     * with translation data
     * @return mixed
     */


    /**
     * Returns many translations
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */

}
