<?php

use Illuminate\Database\Seeder;

class CategoryCostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\CategoryCosts::class,20)->create();
    }
}
