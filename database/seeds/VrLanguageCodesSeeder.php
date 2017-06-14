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

            ["id" => "LT" , "language_code" => "LT", "name" => "Lietuvių"],
            ["id" => "EN" , "language_code" => "EN", "name" => "English"],
            ["id" => "RU" , "language_code" => "RU", "name" => "Русский"],
            ["id" => "DE" , "language_code" => "DE", "name" => "Deutsch"],
            ["id" => "FR" , "language_code" => "FR", "name" => "Français"],
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
