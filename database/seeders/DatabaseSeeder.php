<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
        'name'=>'admin',
        'email'=>'admin@gmail.com',
        'phone'=> '09448970825',
        'address'=>'Taunggyi',
        'role'=>'admin',
        'password'=>Hash::make('challenges')
        ]);
    }
}
