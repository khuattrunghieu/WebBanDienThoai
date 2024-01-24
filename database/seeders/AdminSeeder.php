<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('admins')->insert([
            'name'=> 'admin',
            'email'=>'admin@gmail.com',
            'password'=>\Hash::make('123456')
        ]);
    }
}
