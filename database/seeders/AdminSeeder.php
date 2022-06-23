<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     User::create([
        'name'=>'okeaja',
        'email'=>'okeaja@gmail.com',
        'password'=>Hash::make('12345'),
        'phone'=>'02848252',
        'motto'=>'aku bisa makan',
        'usia'=> 23,
        'status'=>'Belum Menikah',
        'JK'=>'Pria',
        'foto'=>'foto.jpg',
     ]);
    }
}
