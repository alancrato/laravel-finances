<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(CategoryCostsTableSeeder::class);
        $this->call(BillReceiveTableSeeder::class);
        $this->call(BillPayTableSeeder::class);
    }
}
