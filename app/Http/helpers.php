<?php

use App\Models\VrLanguageCodes;
use App\Models\VrMenu;

function getActiveLanguages()
{
    $languages = VrLanguageCodes::where('is_active', 1)->get()->pluck('name', 'id')->toArray();

    $locale = app()->getLocale();

    if(!isset($languages[$locale]))
    {
        $locale = config('app.fallback_locale');

        if(!isset($languages[$locale]))
        {
            return $languages;
        }
    }

    $languages = [$locale => $languages[$locale]] + $languages;
    return $languages;
}

function getFrontEndMenu()
{
    $data = VrMenu::where('vr_parent_id', null)->get()->toArray();

    return [$data];
}