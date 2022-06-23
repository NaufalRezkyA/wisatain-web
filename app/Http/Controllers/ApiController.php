<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function editinfo() {

        $data = User::all();
        return response()->json(['message' => 'Success','data'=>$data]);
    }

    public function store(Request $request){
        $request->validate([
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

        $request['password'] = Hash::make($request['password']);
        $data =  User::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoadmin/',$request->file('foto')->getClientOriginalName());
            $data-> foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return response()->json(['message' => 'Success','data'=>$data]);
    }
    // //delete
    //     public function deleteinfo($id){
    //     User::destroy(auth()->user()->id);
    //     #notifikasi delete berhasil
    //     return response()->json(['message' => 'Success','data'=>null]);
    //     }
    public function auth(Request $request){
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Wrong email/password'
            ], 401);
            return back()->with('loginError','Login failed!!!');
        }
    
        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
    
        return response()->json([
            'success' => true,
            'message' => 'Login success!',
            'data' => [
                'id' => $user->id,
                'nama' => $user->nama,
                'token' => $token,
            ]
        ], 200);
        }
}
