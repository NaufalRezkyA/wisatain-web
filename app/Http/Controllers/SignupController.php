<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function signup()
    {
        return view('signup',['title' => 'signup']);
    }

    public function store(Request $request)
    {
    $validatedDate = $request->validate([
       'name' => 'required|max:225',
       'email' => 'required|email',
       'password' => 'required|min:5|max:25',
       'phone' => 'required',
       'usia' => 'required',
       'motto' => 'required',
       'status' => 'required',
       'JK' => 'required',
       'foto' => 'required',
        ]);

       
        $validatedDate['password'] = Hash::make($validatedDate['password']);

        $data =  User::create($validatedDate);
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoadmin/',$request->file('foto')->getClientOriginalName());
            $data-> foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect('/login')->with('success', 'Signup successful!, Please Login!!! ');

    }
}
