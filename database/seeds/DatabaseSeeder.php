<?php

use App\Models\VrCategories;

use App\Models\VrCategoriesTranslations;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VrRolesSeeder::class);
        $this->call(VrLanguageCodesSeeder::class);
        $this->call(VrCategoriesSeeder::class);
    }
}
