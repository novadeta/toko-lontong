<?php

namespace App\Http\Controllers;

use App\Exports\TransactionExport;
use App\Models\Product;
use App\Models\RevenueComparison;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class TransactionsController extends Controller
{
    public function index()  {
        $transaction  = Transactions::get();
        $transaction->map(function($transaction) {
            $data =  array();
            $decode = json_decode($transaction->products);
            foreach ($decode as $value) {
                $product = Product::where("id",$value->product_id)->first();
                $product['pieces'] = $value->pieces;
                array_push($data,$product);
            }
            return $transaction->products = $data;
        });
        return view('contents.buyings.index',['transactions' => $transaction]);
    }
    public function create()  {
        return view('contents.buyings.create');
    }
    public function store(Request $request)  {
        $data = $request->validate([
            'products' => 'nullable',
            'debt' => Rule::in(['Y','N']),
            'note' =>'nullable',
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
            $month = date('m');
            $year = date('Y');
            $revenue = RevenueComparison::whereMonth('date',$month)->whereYear('date',$year)->first();
            if ($revenue) {
                $revenue->update([
                    'revenue_total' => $revenue->revenue_total + $data['price']
                ]);
            }else {
                RevenueComparison::create([
                    'date' => date('Y-m-d'),
                    'revenue_total' => 0,
                ]);  
            }
            Transactions::create([
                'products' =>  json_encode($products),
                'price' => $data['price'],
                'debt' => $data['debt'],
                'note' => $data['note']
            ]);
            return redirect()->route('buying.create')->with('success','Berhasil transaksi');
        }
    }

    public function edit($id) {
        $transaction = Transactions::where('id',$id)->get();
        $transaction->map(function($transaction) {
            $data =  array();
            $decode = json_decode($transaction->products);
            foreach ($decode as $value) {
                $product = Product::where("id",$value->product_id)->first();
                $product['pieces'] = $value->pieces;
                array_push($data,$product);
            }
            return $transaction->products= $data;
        });
        return view('contents.buyings.edit',['transactions' => $transaction]);
    } 

    public function update(Request $request,$id)  {
        $data = $request->validate([
            'products' => 'nullable',
            'debt' => Rule::in(['Y','N']),
            'note' =>'nullable',
            'price' => 'required|numeric',
            'units' => 'nullable',
        ]);
        if (isset($data['products']) && isset($data['units'])) {
            $transaction = Transactions::where('id', $id)->first();
            $products = [];
            foreach ($data['products'] as $value) {
                $product = Product::where('id',$value)->first();
                $product->update(['sales_amount' => $product->sales_amount  + (int) $data['units'][$value]]);
                array_push($products,[
                        'product_id' => $value ,
                        'pieces' => $data['units'][$value]]);
            }
            $month = date('m');
            $year = date('Y');
            $revenue = RevenueComparison::whereMonth('date',$month)->whereYear('date',$year)->first();
            
            if ($revenue && $data['price'] != $transaction->price) {
                $revenue->update([
                    'revenue_total' => ($revenue->revenue_total - $transaction->price) + $data['price']
                ]);
            }
            $transaction->update([
                'products' =>  json_encode($products),
                'price' => $data['price'],
                'debt' => $data['debt'],
                'note' => $data['note']
            ]);

            return redirect()->route('buying.index')->with('success','Berhasil transaksi');
        }
    }

    public function delete($id) {
        $transactions = Transactions::where('id',$id)->first();
        $transactions->delete();
        return session()->put('message', 'Berhasil menghapus!');
    } 

    public function updateDebt(Request $request,$id)  {
        $transaction = Transactions::where('id',$id)->first();
        $transaction->update(['debt' => 'N']);
        
        return redirect()->route('buying.index')->with('success','Berhasil transaksi');
    }
    public function deleteDebt($id)  {
        $transaction = Transactions::where('id',$id)->first();
        $transaction->delete();

        return redirect()->route('buying.index')->with('success','Berhasil transaksi');
    }
}
