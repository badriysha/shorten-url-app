<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ADMIN
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'roles' => 'ADMIN',
        ]);

        // USER
        User::create([
            'name' => 'Badri Yusron',
            'email' => 'badriysha@user.com',
            'password' => bcrypt('password'),
            'roles' => 'USER',
        ]);
    }
}
