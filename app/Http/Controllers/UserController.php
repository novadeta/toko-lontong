<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function authenticate(Request $request)  { 
        $validate = Validator::make($$request->all(),[
            'name' => 'required',
            'password' => 'requred'
        ]);
    }
}
