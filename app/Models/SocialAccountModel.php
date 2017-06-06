<?php

namespace App\Models;


use App\Models\VRUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class SocialAccountModel extends Authenticatable
{
    protected $table = 'social_accounts_models';

    protected $fillable = ['user_id', 'provider_user_id', 'provider'];
}
