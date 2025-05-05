<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'sadat',
             'email'=>'sadat@gmail.com',
             'password'=>Hash::make('password'),
             'type'=>'admin',

        ]
        );
    }
}
