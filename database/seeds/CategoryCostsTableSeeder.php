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
        factory(\App\CategoryCosts::class,10)->create();
    }
}
