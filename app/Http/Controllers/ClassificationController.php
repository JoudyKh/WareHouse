<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;
use Illuminate\Support\Facades\Artisan;

class ClassificationController extends Controller
{
    // عرض التصنيفات
    public function classShow()
    {
        $classifications = Classification::all();
        return response()->json([$classifications]);
    }

    // seed classifications
    public function seedClassification(Request $request)
    {
        Artisan::call('db:seed', ['--class' => 'ClassificationSeeder']);
    }
}
