<?php

namespace App\Http\Controllers;

use App\Models\ExpenseLog;
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
        $products = Product::get();
        $data = [];
        $transactions = Transactions::get();
        // foreach ($product as $value) {
        //     foreach ($transactions as $transaction){
        //         $decode = json_decode($transaction->products) ;
        //         foreach ($decode as $value) {
        //             $model = Product::where('id',$value->product_id)->first();
        //             foreach ($data as $key => $element) {
        //                 if ($model->id == $data[$key]['id']) {
        //                     $data[$key]['pieces'] =  $data[$key]['pieces'] + $model->pieces;
        //                 }else {
        //                     array_push($data,[
        //                         'id' => $model->id,
        //                         'name' => $model->name,
        //                         'pieces' => $value->pieces
        //                 ]);
        //                 }
                    
        //             }
        //         };
        //     }
        // }
        foreach ($products as $product) {
            $total = 0;
            foreach ($transactions as $transaction) {
                $decode = json_decode($transaction->products) ;
                foreach ($decode as $decodedProduct) {
                    if ($decodedProduct->product_id == $product->id) {
                        // Menambahkan jumlah pieces dari setiap transaksi
                        $total += $decodedProduct->pieces;
                    }
                }
            }

            $data[] = [
                'id' => $product->id,
                'name' => $product->name,
                'pieces' => $total
            ];
        }
        usort($data, function($a, $b) {
            return $b['pieces'] - $a['pieces'];
        });
    
        $product['total_revenue'] = $data;
        return response()->json(['data' => $product['total_revenue']],200);
        
    }
    public function getRecapRevenue(Request $request) {
        $year = $request->query('year');
        $revenue = RevenueComparison::whereYear('date',$year)->get();
        return response()->json(['data' => $revenue],200);
    }
    public function getComparison(Request $request) {
        $year = $request->query('year');
        $data = [];
        $year = 2019;
        for ($i=0; $i < 6; $i++) { 
            $revenue = RevenueComparison::whereYear('date', $year)->sum('revenue_total');
            array_push($data,[
                'year' => $year,
                'revenue' => $revenue
            ]);
            $year += 1;

        }
        return response()->json(['data' => $data]);
    }
}
