<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ApiTransaksiController extends Controller
{
    public function createTransaction(Request $request, $id_wisata)
    {
        $paket_wisata = Wisata::findOrFail($id_wisata)->first();
        $data_cust = Customer::findOrFail(auth()->user()->id)->first();
        $data = Transaksi::create([
            'id_user'=> $data_cust->id,
            'id_wisata' => $id_wisata,
            'email_customer'=>$data_cust->email,
            'nama_wisata' => $paket_wisata->nama,
            'payment_date'=> $request->payment_date,
            'payment_status'=> "Unpaid",
            'total_price' => $paket_wisata->harga
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction success!',
            'data' => $data
        ], 201);
    }

    public function allTransaction()
    {
        $data = DB::table('transaksi')
            ->join('users', 'transaksi.id_user', '=', 'users.id')
            ->join('paket_wisata', 'transaksi.id_paket_wisata', '=', 'paket_wisata.id')
            ->select('transaksi.id', 'users.nama', 'paket_wisata.nama_paket', 'transaksi.email_customer', 'transaksi.total_price', 'paket_wisata.harga', 'transaksi.packet', 'transaksi.payment_status', 'transaksi.created_at','wisatas.foto')
            ->get();

        if (!$data->isEmpty()) {
            return response()->json([
                'status' => true,
                'message' => 'Transaction successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No transaction found'
            ], 404);
        }
    }


    public function historyTransaction()
    {
        $data = DB::table('transactions')
            ->join('customers', 'transactions.id_user', '=', 'customers.id')
            ->join('wisatas', 'transactions.id_wisata', '=', 'wisatas.id')
            ->select('wisatas.rating','wisatas.foto','wisatas.nama', 'transactions.email_customer', 'transactions.total_price', 'transactions.payment_status', 'transactions.payment_date')
            ->where('transactions.id_user', '=', auth()->user()->id)
            ->get();

        if (!$data->isEmpty()) {
            return response()->json([
                'status' => true,
                'message' => 'Transaction successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No transaction found'
            ], 404);
        }
    }

    // public function acceptTransaction($id)
    // {
    //     try {
    //         $data = Transaction::findOrFail($id);
    //         $data->update([
    //             'status' => 'Accepted'
    //         ]);
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Transaction status has been accept!'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Accept transaction error!',
    //             'errors' => $e->getMessage()
    //         ], 422);
    //     }
    // }
    public function rejectTransaction($id)
    {
        try {
            $data = Transaction::find($id);
            $data->update([
                'status' => 'Rejected'
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Transaction status has been rejected!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Reject transaction error!',
                'errors' => $e->getMessage()
            ], 422);
        }
    }
}
