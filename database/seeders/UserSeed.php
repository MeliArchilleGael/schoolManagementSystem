<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::query()->create([
           'name'=>"Gael",
            "email"=> "meli@gmail.com",
            "password"=> Hash::make("password"),
            "email_verified_at"=> now(),
        ]);

    }
}
