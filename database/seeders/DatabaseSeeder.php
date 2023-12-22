<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ClassificationsSeeder;
use Database\Seeders\OwnerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClassificationSeeder::class,
            CompanySeeder::class,
            UserSeeder::class
        ]);
    }
}
