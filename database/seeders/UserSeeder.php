<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('users')->insert([
            [
                'name' => 'Admin Acc',
                'uuid' => '058521EF093100',
                'label' => 'muka_admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('adminabsensi'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // User::factory()->count(10)->create([
        //     ''
        // ]);
    }
}
