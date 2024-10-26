<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,        // Assuming you have a UserSeeder
            LocationSeeder::class,    // Your location seeder
            TransactionSeeder::class,  // Your transaction seeder
        ]);
    }
}
