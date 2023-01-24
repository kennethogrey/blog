<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }
    public function index(Request $request){
        return view('back.pages.home');
    }
}
