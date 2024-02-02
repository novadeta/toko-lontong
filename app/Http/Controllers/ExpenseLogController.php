<?php

namespace App\Http\Controllers;

use App\Models\ExpenseLog;
use Illuminate\Http\Request;

class ExpenseLogController extends Controller
{
    public function index() {
        $shopping = ExpenseLog::get();
        return view('contents.shoppings.index',['shoppings'=> $shopping]);
    }   
    public function create() {
        return view('contents.shoppings.create');
    }   
    public function store() {
        
    }   
}
