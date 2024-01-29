<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()  {
        return view('contents.products.index');
    }
    public function store()  {
        return view('contents.index');
    }
}
