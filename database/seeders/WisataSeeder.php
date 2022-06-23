<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wisatas')->insert([
            'nama' => 'Kuta Beach',
            'foto' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/03/ea/ac/8a/kuta.jpg?w=1200&h=-1&s=1',
            'lokasi' => 'Denpasar, Bali',
            'deskripsi' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English',
            'rating' => '5',
            'harga' => '15000',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        );
        DB::table('wisatas')->insert([
            'nama' => 'Pink Beach',
            'foto' => 'https://www.aquaexpeditions.com/wp-content/uploads/2020/08/pink.jpg',
            'lokasi' => 'Labuan Bajo, NTB',
            'deskripsi' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English',
            'rating' => '5',
            'harga' => '15000',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        );
        DB::table('wisatas')->insert([
            'nama' => 'Gunung Semeru',
            'foto' => 'https://statics.indozone.news/content/2019/07/12/Q8slg0/t_5d294ba12b006_700.jpg',
            'lokasi' => 'Kabupaten Lumajang, Jawa Timur',
            'deskripsi' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English',
            'rating' => '4',
            'harga' => '15000',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        );
        DB::table('wisatas')->insert([
            'nama' => 'Monumen Nasional',
            'foto' => 'https://awsimages.detik.net.id/community/media/visual/2022/06/16/apakah-monas-sudah-buka-cek-info-lengkapnya-di-sini_169.jpeg?w=620',
            'lokasi' => 'Jakarta Pusat, Jakarta',
            'deskripsi' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English',
            'rating' => '5',
            'harga' => '20000',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        );
        DB::table('wisatas')->insert([
            'nama' => 'Candi Borobudur',
            'foto' => 'https://akcdn.detik.net.id/community/media/visual/2020/12/10/zona-rupadhatu-candi-borobudur_169.jpeg?w=620',
            'lokasi' => 'Kabupaten Magelang, Jawa Tengah',
            'deskripsi' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English',
            'rating' => '5',
            'harga' => '500000',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        );
    }
}
