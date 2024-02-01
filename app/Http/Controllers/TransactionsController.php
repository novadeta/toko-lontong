<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransactionsController extends Controller
{
    public function index()  {
        $transaction  = Transactions::get();
        // $debt_transaction =  Transactions::where('debt','Y')->get();
        $transaction->map(function($transaction) {
            $data =  array();
            $hehe =  null;
            $decode = json_decode($transaction->products);
            foreach ($decode as $value) {
                $product = Product::where("id",$value->product_id)->first();
                $product['pieces'] = $value->pieces;
                array_push($data,$product);
            }
            return $transaction->products= $data;
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
            Transactions::create([
                'products' =>  json_encode($products),
                'price' => $data['price'],
                'debt' => $data['debt']
            ]);
            return redirect()->route('buying.create')->with('success','Berhasil transaksi');
        }
    }
}
