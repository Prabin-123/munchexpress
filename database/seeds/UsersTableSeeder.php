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
        $user = User::create([
            'name' => 'Prabin Adhikari',
            'email' => 'prabin@mail.com',
            'password' => bcrypt('password'),
        ]);
        $user->restaurants()->create([
            'name' => 'A-one Star',
            'location' => 'Tarkeshwor-10, Kathmandu, Nepal',
        ]);
        $user->restaurants()->create([
            'name' => 'Classic Foodland',
            'location' => 'Tokha-12, Kathmandu, Nepal',
        ]);
        $user->restaurants()->create([
            'name' => 'Thakali Bhanxaghar',
            'location' => 'Pokhara, Nepal',
        ]);
    }
}
