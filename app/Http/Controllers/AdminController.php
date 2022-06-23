<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function editinfo(){

        return view('editinfo');
    }

    # fungsi update info akun 
    public function updateinfo(Request $request){

        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'usia' => 'required',
            'motto' => 'required',
            'status' => 'required',
            'JK' => 'required',
        ]);
        # mengupdate info akun berdasarkan id 
        $data = User::find(auth()->user()->id);
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoadmin/',$request->file('foto')->getClientOriginalName());
            $data-> foto = 'fotoadmin/'. $request->file('foto')->getClientOriginalName();
        }
        # request update 
        $request->user()->update(
            $request->all()
        
        );
        # notifikasi berhasil update
        return redirect('/dataAdmin')->with('berhasil','Edit Succes!!!');
    }

    # fungsi delete akun
    public function deleteinfo(){
        # delete akun berdasarkan id
        User::destroy(auth()->user()->id);
        #notifikasi delete berhasil
        return redirect('/login')->with('delete_s','Delete Account Succes!!!');

    }

}
