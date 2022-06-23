<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Customer::where('full_name','LIKE','%' .$request->search.'%')->paginate(5);
        }else{
            $data = Customer::paginate(5);
            // $data = customer::all();
        }
        return view('datacustomer',compact('data'));
    }

    public function tambahcustomer(){
        return view('tambahcustomer');
    }

    public function insertcustomer(Request $request){
        // dd($request->all());
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);
        $request['password'] = Hash::make($request['password']);
        //notifikasi/alert belum muncul

        $data = Customer::create($request->all());
        return redirect()->route('customer')->with('success',' Data Berhasil Di Tambahkan ke List customer');
    }

    public function editcustomer(){
        $data = Session::get('datacustomer');
        return view('editcustomer',compact('data'));
    }

    public function showcustomer($id){
        $data = Customer::find($id);
        Session::put('datacustomer',$data);
        // dd($data);
        return redirect()->action([CustomerController::class, 'editcustomer']);
    }

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
        return redirect()->route('customer')->with('success',' Data Berhasil Di Update ke List customer');
    }

    public function deletecustomer($id){
        $data = Customer::find($id);
        $data->delete();
        return redirect()->route('customer')->with('success',' Data Berhasil Di Delete dari List customer');
    }
}
