<?php

use App\Models\VrLanguageCodes;
use Illuminate\Database\Seeder;

class VrLanguageCodesSeeder extends Seeder
{
    /**
     * Run the database seeds for language codes.
     *
     * @return void
     */
    public function run()
    {
        $langCodes = [

            ["id" => "lt" , "language_code" => "LT", "name" => "Lietuvių"],
            ["id" => "en" , "language_code" => "EN", "name" => "English"],
            ["id" => "ru" , "language_code" => "RU", "name" => "Русский"],
            ["id" => "de" , "language_code" => "DE", "name" => "Deutsch"],
            ["id" => "fr" , "language_code" => "FR", "name" => "Français"],
        ];
        DB::beginTransaction();
        try {
            foreach ($langCodes as $langCode) {
                $record = VrLanguageCodes::find($langCode['id']);
                if (!$record) {
                    VrLanguageCodes::create($langCode);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            echo 'Point of failure '. $e->getCode() . ' ' . $e->getMessage();
            throw new Exception($e);
        }
        DB::commit();
    }
}
