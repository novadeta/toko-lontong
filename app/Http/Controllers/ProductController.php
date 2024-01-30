<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function search(Request $request)  {
        
    }   

    public function index()  {
        return view('contents.products.index');
    }
    public function create()  {
        return view('contents.products.create');
    }
    public function store(Request $request)  {
        $data = $request->validate([
            'name' => 'required',
            'debt' => [
                'required',
                Rule::in(['Y','N'])
            ],
            'sales_amount' => 'required'
        ]);

        Product::create($data);
        return redirect()->route('admin.carousel')->with('success','Berhasil menambahkan produk');
    }
}
