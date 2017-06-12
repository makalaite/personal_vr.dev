<?php

use App\Models\VrLanguageCodes;

function getActiveLanguages()
{
    $active = VrLanguageCodes::where('is_active', 1)->get()->pluck('name', 'id');
    return $active;
}