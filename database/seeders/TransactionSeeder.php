<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Wisata;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transactions')->insert([
            'email_customer' => Customer::inRandomOrder()->first()->email,
            'nama_wisata' => Wisata::inRandomOrder()->first()->nama,
            'payment_date' => '02 Desember 2022',
            'payment_status' => 'Paid',
            'total_price' => '500000',
            'foto'=>'test',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('transactions')->insert([
            'email_customer' => Customer::inRandomOrder()->first()->email,
            'nama_wisata' => Wisata::inRandomOrder()->first()->nama,
            'payment_date' => '03 Desember 2022',
            'payment_status' => 'Paid',
            'total_price' => '500000',
            'foto'=>'test',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('transactions')->insert([
            'email_customer' => Customer::inRandomOrder()->first()->email,
            'nama_wisata' => Wisata::inRandomOrder()->first()->nama,
            'payment_date' => '04 Desember 2022',
            'payment_status' => 'Paid',
            'total_price' => '500000',
            'foto'=>'test',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('transactions')->insert([
            'email_customer' => Customer::inRandomOrder()->first()->email,
            'nama_wisata' => Wisata::inRandomOrder()->first()->nama,
            'payment_date' => '05 Desember 2022',
            'payment_status' => 'Paid',
            'total_price' => '500000',
            'foto'=>'test',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('transactions')->insert([
            'email_customer' => Customer::inRandomOrder()->first()->email,
            'nama_wisata' => Wisata::inRandomOrder()->first()->nama,
            'payment_date' => '06 Desember 2022',
            'payment_status' => 'Paid',
            'total_price' => '500000',
            'foto'=>'test',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
