<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        return redirect()->route('product.index')->with('success','Berhasil menambahkan produk');
    }

    public function show($id)  {
        $product = Product::find($id);
        // return redirect()->route('product.')->with('success','Berhasil menambahkan produk');
    }

    public function update(Request $request)  {
        $data = $request->validate([
            'name' => 'required',
            'debt' => [
                'required',
                Rule::in(['Y','N'])
            ],
            'sales_amount' => 'required'
        ]);

        Product::create($data);
        // return redirect()->route('admin.carousel')->with('success','Berhasil menambahkan produk');
    }

    
}
