<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function search(Request $request)  {
        $search = $request->query('search'); 
        if ($search == null) {
            $product = Product::where('name','LIKE',$search)->limit(5)->get();
        }else{
            $product = Product::where('name','LIKE','%'.$search.'%')->get();
        }

        return response()->json(['data' => $product],200);
    }   

    public function dashboard()  {
        $products = Product::all();

        return view('contents.index',['products' => $products]);
    }
    public function index()  {
        $products = Product::all();

        return view('contents.products.index',['products' => $products]);
    }
    public function create()  {
        return view('contents.products.create');
    }
    public function store(Request $request)  {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'image|max:2048'
        ]);
        if ($request->has('image')) {
            $tmp = $request->file('image');
            $random_string = Str::random(15);
            $extension = $tmp->extension();
            $name = date("Y-m-d") .  $random_string . '.' . $extension;
            $tmp->storePubliclyAs('photos/',$name,'public');
            $data['image'] = $name;
        }else {
            $data['image'] = 'default.png';
        }
        $data['sales_amount'] = 0;
        Product::create($data);
        if ($request->query('action') == 'shopping') {
            return redirect()->route('shopping.create')->with('success','Berhasil menambahkan produk');
        }elseif ($request->query('action') == 'buying') {
            return redirect()->route('buying.create')->with('success','Berhasil menambahkan produk');
        }elseif ($request->query('action') == 'editBuying') {
            return redirect()->route('buying.index')->with('success','Berhasil menambahkan produk');
        }else{
            return redirect()->route('product.index')->with('success','Berhasil menambahkan produk');
        }
    }

    public function update(Request $request,$id)  {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'nullable'
        ]);
        $product = Product::where('id', $id)->first();
        if ($request->has('image')) {
            $tmp = $request->file('image');
            $random_string = Str::random(15);
            $extension = $tmp->extension();
            $name = date("Y-m-d") .  $random_string . '.' . $extension;
            $tmp->storePubliclyAs('photos/',$name,'public');
            $data['image'] = $name;
            $product->update([
                'name' => $data['name'],
                'image' => $data['image']
            ]);
            return redirect()->route('product.index')->with('success','Berhasil mengganti produk');
        }
        $product->update([
            'name' => $data['name'],
        ]);
        
        return redirect()->route('product.index')->with('success','Berhasil mengganti produk');
    }

    public function delete($id) {
        $transactions = Product::where('id',$id)->first();
        $transactions->delete();
        return session()->put('message', 'Berhasil menghapus!');
    } 
}
