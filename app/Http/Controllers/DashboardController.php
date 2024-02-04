<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RevenueComparison;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getComparisonToday() {
        
    }
    public function getTopProduct() {
        $transactions = Transactions::get();
        $product = Product::where('debt','N')->get();
        $data = [];
        $transactions->map(function ($transaction) use ($data){
            $decode = json_decode($transaction->products);
            foreach ($decode as $key => $value) {
                
            }   
            $data = [];
            
            return $transaction->total = $data;
        });
        return $transactions;
        
    }
    public function getRecapRevenue(Request $request) {
        $year = $request->query('year');
        $revenue = RevenueComparison::whereYear('date',$year)->get();
        return response()->json(['data' => $revenue],200);
    }
    public function getComparison() {
        $revenue = RevenueComparison::whereYear('date','2024')->get();
        return response()->json(['data' => $revenue]);
    }
}
