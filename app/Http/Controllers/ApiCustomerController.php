<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApiCustomerController extends Controller
{
    
    public function index() {

        $data = Customer::all();
        return response()->json(['message' => 'Success','data'=>$data]);
    }
    //detail
    public function showcustomer($id){
        $data = Customer::find($id);
        return response()->json(['message' => 'Success','data'=>$data]);
    }
    
    //create
    public function insertcustomer(Request $request){
    $request->validate([
        'full_name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'password' => 'required',
    ]);
    $request['password'] = Hash::make($request['password']);
    $data = Customer::create($request->all());
    return response()->json(['message' => 'Success','data'=>$data],200);
    }

    //update
    public function updatecustomer(Request $request, $id){
        $request->validate([
            'full_name' => '',
            'email' => '',
            'phone' => '',
            'password' => '',
        ]);

        $request['password'] = Hash::make($request['password']);

        $data = Customer::find($id);
        $data->update($request->all());
        return response()->json(['message' => 'Success update','data'=>$data]);
    }

    //delete
    public function deletecustomer(){
    $data = Customer::find($id);
    $data->delete();
    return response()->json(['message' => 'Success delete','data'=>null]);
    }

    public function auth(Request $request){
        if (!Auth::guard('customer')->attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Wrong email/password'
            ], 401);
            return back()->with('loginError','Login failed!!!');
        }
    
        $user = Customer::where('email', $request->email)->firstOrFail();
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

    public function getProfile()
    {
        try {
            $data =  Customer::find(auth()->user()->id);
            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'errors' => $e->getMessage()
            ], 400);
        }
    }


     # fungsi untuk logout
     public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        try{
            return response()->json([
                'success' => true,
                'message' => 'Logout success!',
            ], 200);
        }catch(\Throwable $e){
            return response()->json([
                'success' => true,
                'message' => 'Logout failed!',
                'error' => $e->getMessage()
            ], 422);
        }
        
    }
}
