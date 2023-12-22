<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Med;
use App\Models\Classification;
use App\Models\Owner;

class MedController extends Controller
{
    // عرض الادوية حسب التصنيف 
    public function medIndex(Request $request)
    {
        $class = Classification::where('id', $request->class_id)->first();
        return response()->json([$class->meds]);
    }

    // عرض تفاصيل الدوا 
    public function medShow($id)
    {
        $medicine = Med::where('id', $id)->first();
        if ($medicine) {
            return response()->json(['message' => $medicine]);
        }
        return response()->json(['message' => 'Not found']);
    }

    // show all medicines
    public function medShowAll(){
        $medicines = Med::all();
        if ($medicines){
            return response()->json(['message' => $medicines]);
        }
        return response()->json(['message' => 'not found']);
    }

    // ادخال دواء 
    public function medStore(Request $request)
    {
        $request->validate([
            'sci_name' => 'required|string',
            'adv_name' => 'required|string',
            'company_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'expiration_date' => 'required|date|after:now',
            'class_id' => 'required|numeric',
            'store_name' => 'required|string|unique:users'
        ]);
        Med::create([
            'sci_name' => $request->sci_name,
            'adv_name' => $request->adv_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'expiration_date' => $request->expiration_date,
            'class_id' => $request->class_id,
            'company_id' => $request->company_id,
            'store_name' => $request->store_name
        ]);
        // $request->store_name=Owner::get('store_name');
        return response()->json(['message' => 'Medicine added succesfuly']);
    }

    // البحث عن دواء 
    public function medSearch(Request $request)
    {
        $medicine = Med::where('sci_name', $request->sci_name)
            ->orwhere('adv_name', $request->adv_name)
            ->orwhere('class_id', $request->class_id)
            ->orwhere('store_name', $request->store_name)
            ->get()->all();

        if ($medicine) {
            return response()->json(['message' => $medicine]);
        }
        return response()->json(['message' => 'Not found']);
    }
}
