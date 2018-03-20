<?php

use Illuminate\Database\Seeder;

class BillReceiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\BillReceive::class,20)->create();
    }
}
