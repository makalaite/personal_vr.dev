<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VrLanguageCodes extends Model
{
    use UuidTrait;
    public $incrementing = false;
    public $updated_at = false;
    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_language_codes';

    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'language_code'];
}
