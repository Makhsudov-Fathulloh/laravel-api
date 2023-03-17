<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => Hash::make('secret1176'),
        ]);

        $user->roles()->attach([1, 2]);


        $user2 = User::create([
            'name' => 'Maks',
            'email' => 'mr.maks@gmail.com',
            'password' => Hash::make('secret123'),
        ]);

        $user2->roles()->attach([1, 2]);

        /* User::create([
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('secret'),
        ]); */

        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory(10)->unverified()->create();
        // \App\Models\User::factory(10)->make(); // MO tushmaydi
    }
}
