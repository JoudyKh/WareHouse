<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classification::create([
            'id' => '1',
            'name' => 'antibiotics'
        ]);
        Classification::create([
            'id' => '2',
            'name' => 'abdomens'
        ]);
        Classification::create([
            'id' => '3',
            'name' => 'chemical'
        ]);
        Classification::create([
            'id' => '4',
            'name' => 'neurological'
        ]);
        Classification::create([
            'id' => '5',
            'name' => 'psychological'
        ]);
        Classification::create([
            'id' => '6',
            'name' => 'cardiac'
        ]);
        Classification::create([
            'id' => '7',
            'name' => 'respirtories'
        ]);
    }
}
