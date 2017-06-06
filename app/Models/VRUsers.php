<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class VRUsers extends Authenticatable
{
    use Notifiable;
    public $incrementing = false;
    use SoftDeletes;
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_users';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'user_name', 'last_name', 'email', 'password', 'phone', 'remember_token'];

    /**
     * Fields which will be hidden
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */


}
