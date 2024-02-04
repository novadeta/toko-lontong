<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function authenticate(Request $request){
        $request->session()->forget('message');
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
        $user = User::where('name',$credentials['name'])->first();
        if (isset($user->name) && $user->name == $credentials['name'] && $user->password == $credentials['password']) {
            Auth::login($user);
            return redirect()->route('dashboard');
        }
        return back()->with([
            'message' => 'Username atau Password salah!',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('login');
    }

}
