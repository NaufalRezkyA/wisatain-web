<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Wisata;

class ApiWisataController extends Controller
{
    public function index() {

        $data = Wisata::all();
        return response()->json(['message' => 'Success','data'=>$data]);
    }
    //detail
    public function showwisata($id){
        $data = Wisata::find($id);
        return response()->json(['message' => 'Success','data'=>$data]);
    }
    
    //create
    public function insertwisata(Request $request){

    $data = Wisata::create($request->all());
    // if($request->hasFile('foto')){
    //     $request->file('foto')->move('fotowisata/',$request->file('foto')->getClientOriginalName());
    //     $data-> foto = $request->file('foto')->getClientOriginalName();
    //     $data->save();
    // }
    return response()->json(['message' => 'Success','data'=>$data]);

    }

    //update
    public function updatewisata(Request $request, $id){
        $request->validate([
        'nama' => '',
        'lokasi' => '',
        'deskripsi' => '',
        'harga' => '',
        'rating' => '',
        ]);

        $data = Wisata::find($id);
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotowisata/',$request->file('foto')->getClientOriginalName());
            $data-> foto = 'fotowisata/'. $request->file('foto')->getClientOriginalName();
         }
   
        $data->update($request->all());
        return response()->json(['message' => 'Success Update','data'=>$data]);

    // $data = Wisata::find($id);

        // if (!$data) {
        //     return response()->json([
        //         'isSuccess' => false,
        //         'message' => 'id tidak ditemukan',
        //     ], 404);
        // }

        // $data->update([
        //     'nama' => $request->nama,
        //     'lokasi' => $request->lokasi,
        //     'deskripsi' => $request->deskripsi,
        //     'harga' => $request->harga,
        //     'rating' => $request->rating,
        // ]);

        // return response()->json([
        //     'isSuccess' => true,
        //     'message' => "plan berhasil diupdate",
        // ], 200);

        }
        //delete
        public function deletewisata($id){
            $data = Wisata::find($id);
            $data->delete();
            return response()->json(['message' => 'Success Update','data'=>null]);
        }
}
