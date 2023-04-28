<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@ri8travel.com';
        $admin->password = Hash::make('123456789');
        $admin->role = 'admin';
        $admin->save();
    }
}
