<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WisataController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Wisata::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
        }else{
            $data = Wisata::paginate(5);
            // $data = Wisata::all();
        }
        return view('datawisata',compact('data'));
    }

    public function tambahwisata(){
        return view('tambahwisata');
    }

    public function insertwisata(Request $request){
        // dd($request->all());
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'rating' => 'required',
            'foto' => 'required',
        ]);

        //notifikasi/alert belum muncul

        $data = Wisata::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotowisata/',$request->file('foto')->getClientOriginalName());
            $data-> foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('wisata')->with('success',' Data Berhasil Di Tambahkan ke List Wisata');
    }

    public function editwisata(){
        $data = Session::get('datawisata');
        return view('editwisata',compact('data'));
    }

    public function showwisata($id){
        $data = Wisata::find($id);
        Session::put('datawisata',$data);
        // dd($data);
        return redirect()->action([WisataController::class, 'editwisata']);
    }

    public function updatewisata(Request $request, $id){
        // dd($request->all());

        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'rating' => 'required',
        ]);
        // dd($request->all());
        $data = Wisata::find($id);
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotowisata/',$request->file('foto')->getClientOriginalName());
            $data-> foto = 'fotowisata/'. $request->file('foto')->getClientOriginalName();
        }
        // dd($request->all());
        $data->update($request->all());
        return redirect()->route('wisata')->with('success',' Data Berhasil Di Update ke List Wisata');
    }

    public function deletewisata($id){
        $data = Wisata::find($id);
        $data->delete();
        return redirect()->route('wisata')->with('success',' Data Berhasil Di Delete dari List Wisata');
    }

}
