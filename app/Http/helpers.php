<?php

use App\Models\VrLanguageCodes;
use App\Models\VrMenu;
use App\Models\VrPages;

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
    $data = VrMenu::where('vr_parent_id', null)->with('children')->orderByDesc('sequence')->get()->toArray();

    return $data;
}

function getVrRooms()
{
    $data = VrPages::where('category_id', 'vr_rooms')->get()->toArray();
    return $data;
}