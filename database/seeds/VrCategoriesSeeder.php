<?php

use Illuminate\Database\Seeder;
use App\Models\VrCategories;
use App\Models\VrCategoriesTranslations;

class VrCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ["id" => "vr_rooms"],
        ];

        $categoriesTrans =
        [
            ["record_id" => "vr_rooms" , "language_code" => "lt", "name" => "Virtualūs kambariai"],
            ["record_id" => "vr_rooms" , "language_code" => "en", "name" => "Virtual rooms"],
            ["record_id" => "vr_rooms" , "language_code" => "ru", "name" => "Виртуальные комнаты"],
            ["record_id" => "vr_rooms" , "language_code" => "de", "name" => "Virtuelle Räume"],
            ["record_id" => "vr_rooms" , "language_code" => "fr", "name" => "Chambres virtuelles"],
        ];

        DB::beginTransaction();
        try {
            foreach ($categories as $category) {
                $record = VrCategories::find($category['id']);
                if (!$record) {
                    VrCategories::create($category);
                }
            }

            foreach ($categoriesTrans as $categoryTrans) {
                $record = VrCategoriesTranslations::where('record_id', $categoryTrans['record_id'] )
                                                    ->where('language_code', $categoryTrans['language_code'] )
                                                    ->first();
                if (!$record) {
                    VrCategoriesTranslations::create($categoryTrans);
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
