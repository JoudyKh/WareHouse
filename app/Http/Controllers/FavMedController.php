<?php 
 
namespace App\Http\Controllers; 
 
use App\Http\Controllers\MedController; 
use Illuminate\Http\Request; 
use App\Models\FavMed; 
use App\Models\Med; 
 
class FavMedController extends Controller 
{ 
    public function favIndex(){ 
        $medicines = FavMed::all(); 
        return response()->json([$medicines]); 
    } 
 
    public function favStore(Request $request){ 
        $medicine = Med::find($request->id); 
        $favMed = new FavMed(); 
        $favMed->med_id = $medicine->id; 
        $favMed->sci_name = $medicine->sci_name; 
        $favMed->adm_name = $medicine->adm_name; 
        $favMed->company = $medicine->company; 
        $favMed->quantity = $medicine->quantity; 
        $favMed->price = $medicine->price; 
        $favMed->expiration_date = $medicine->expiration_date; 
        $favMed->class_id = $medicine->class_id; 
        $favMed->save(); 
       return response()->json(['ok']); 
    } 
 
    public function favDestroy($id){ 
        FavMed::destroy($id); 
        return response()->json(['message' => 'success']); 
    } 
}