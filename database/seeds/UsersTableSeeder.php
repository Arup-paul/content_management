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
        User::insert([
            'name' => 'Arup Paul',
            'email'=> 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::insert( [
            'name' => 'Mishu Paul',
            'email'=> 'author@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
