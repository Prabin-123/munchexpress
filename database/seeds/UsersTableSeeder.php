<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Prabin Adhikari',
            'email' => 'prabin@mail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
