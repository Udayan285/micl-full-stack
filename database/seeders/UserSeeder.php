<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        
        $user = new User();
        $user->first_name = "Author";
        $user->last_name = "MICL";
        $user->slug = "author";
        $user->email = "author@gmail.com";
        $user->password = Hash::make('123');
        $user->save();
        $user->assignRole('admin');

        $user = new User();
        $user->first_name = "Moderator";
        $user->last_name = "MICL";
        $user->slug = "moderator";
        $user->email = "moderator@gmail.com";
        $user->password = Hash::make('123');
        $user->save();
        $user->assignRole('admin');

        
    }
}