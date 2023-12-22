<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Med;



class OrderController extends Controller
{
    // show all orders
    public function orderIndex(){
        $orders = Order::all();
        return response()->json([$orders]);
    }

    // show orders of a pharmacist
    public function orderShow(){
        $id = Auth::id();
        $orders = Order::where('user_id', $id)->all();
        if ($orders) {
            return response()->json([$orders]);
        }
        return response()->json(['empty']);
    }

    // create orders
    public function orderStore(Request $request){
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
        $user = User::find($request->user_id);
        $medicine = Med::find($request->med_id);
        $order = new Order();
        $order->user_id=$user->id;
        $order->quantity = $request->quantity;
        // $order->total
        if ($medicine->quantity >= $order->quantity) {
            $medicine->quantity = $medicine->quantity - $order->quantity;
            $medicine->save();
        } else {
            return response()->json(['invalid' => 'quantity not available']);
        }
        if ($request->quantity == 0) {
            return response()->json(['invalid' => 'invalid request']);
        }
        return response()->json(['success' => 'the order has been booked']);
    }

    // calculate total price
    public function totalPricePerMed(Request $request){
        $total_price = $request->total_price;
        return $total_price;
    }

    public function totalPrice(Request $request){
        // $pharmacist = getPharmaId();
    }

    // get the pharmacist from phone number
    public function getPharmaId(Request $request)
    {
        $pharmacist = User::where('phone_number', $request->phone_number)->get();
        $pharma_id = $pharmacist->id;
        return $pharma_id;
    }
}
