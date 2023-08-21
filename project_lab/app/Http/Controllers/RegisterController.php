<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register',[
            "title"=>"Register"
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        
        $validatedData = $request->validate([
            'name' => ['required','regex:/^[\pL\s\-]+$/u','max:255'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:20'
        ]);
        // dd($validatedData);
        
        if(!$validatedData){
            return back()->with('registerError');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
    
        if(User::create($validatedData)){
            return redirect('/login')->with('success', 'Registration successfull! Please login');
        }

        
    }

}
