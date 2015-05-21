<?php

use Illuminate\Database\Seeder;
use App\User;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(['name' => 'Admin', 'email' => 'punyaindra@gmail.com', 'password' => Hash::make('admin')]);
    }

}