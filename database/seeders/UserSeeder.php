<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        $name='Asikul Islam Sazzat';
        User::create([
            'role_id'=>1,
            'is_system_admin'=>1,
            'name'=>$name,
            'slug'=>Str::slug($name),
            'email'=>'asikulislamsazzat@gmail.com',
            'phone'=>'01755805553',
            'user_image'=>'default_user.jpg',
            'email_verified_at'=>now(),
            'password'=>Hash::make(12011016),
            'remember_token'=>Str::random(10),
        ]);
    }
}


