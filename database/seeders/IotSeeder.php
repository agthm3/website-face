<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('iots')->insert([
            [
                'mac' => '7A-EC-20-97-FF-9E',
                'name' => 'face_recog',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mac' => '6E-1B-ED-BE-13-B3',
                'name' => 'rfid_reader',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Anda bisa menambahkan lebih banyak array data di sini jika diperlukan
        ]);
    }

}
