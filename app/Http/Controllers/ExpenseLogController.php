<?php

namespace App\Http\Controllers;

use App\Exports\TransactionExport;
use App\Models\ExpenseLog;
use App\Models\Product;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExpenseLogController extends Controller
{
    public function index() {
        $shopping = ExpenseLog::get();
        return view('contents.shoppings.index',['shoppings'=> $shopping]);
    }   
    public function create() {
        return view('contents.shoppings.create');
    }   
    public function store(Request $request) {
        $data = $request->validate([
            'products' => 'nullable',
            'note' => 'nullable',
            'price' => 'required|numeric',
            'units' => 'nullable',
        ]);
        if (isset($data['products']) && isset($data['units'])) {
            $products = [];
            foreach ($data['products'] as $value) {
                $product = Product::where('id',$value)->first();
                $product->update(['sales_amount' => $product->sales_amount  + (int) $data['units'][$value]]);
                array_push($products,[
                        'product_id' => $value ,
                        'pieces' => $data['units'][$value]]);
            }
            ExpenseLog::create([
                'products' =>  json_encode($products),
                'note' => $data['note'],
                'price' => $data['price'],
            ]);
            return redirect()->route('buying.create')->with('success','Berhasil transaksi');
        }
    }   

    public function getIncome()  {
        $incomes  = Transactions::where('debt','N')->get();
        $incomes->map(function($transaction) {
            $data =  array();
            $decode = json_decode($transaction->products);
            foreach ($decode as $value) {
                $product = Product::where("id",$value->product_id)->first();
                $product['pieces'] = $value->pieces;
                array_push($data,$product);
            }
            return $transaction->products= $data;
        });
        return view('contents.reports.income',['incomes' => $incomes]);
    }
    
    public function getExpense()  {
        $expenses  = ExpenseLog::get();
        return view('contents.reports.expense',['expenses' => $expenses]);
    }

    public function exportIncome() 
    {
        return (new TransactionExport)->download('data-pemasukan.xlsx');
    }
}
