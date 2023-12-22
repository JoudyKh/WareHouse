<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Artisan;


class CompanyController extends Controller
{
    public function companyShow()
    {
        $companies = Company::all();
        return response()->json([$companies]);
    }
    public function seedCompany(Request $request)
    {
        Artisan::call('db:seed', ['--class' => 'CompanySeeder']);
    }
}
