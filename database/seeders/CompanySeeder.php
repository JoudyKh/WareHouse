<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'id' => '1',
            'name' => 'ابن حيّان'
        ]);
        Company::create([
            'id' => '2',
            'name' => 'ابن زهر'
        ]);
        Company::create([
            'id' => '3',
            'name' => 'بركات'
        ]);
        Company::create([
            'id' => '4',
            'name' => 'مختبرات إميسا'
        ]);
        Company::create([
            'id' => '5',
            'name' => 'سيرونيكس'
        ]);
        Company::create([
            'id' => '6',
            'name' => 'يونيفارما'
        ]);
        Company::create([
            'id' => '7',
            'name' => 'الشركة الوطنية'
        ]);
        Company::create([
            'id' => '8',
            'name' => 'سيكو'
        ]);
        Company::create([
            'id' => '9',
            'name' => 'دومنا'
        ]);
    }
}
