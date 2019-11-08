<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Mauro',
            'username' => 'Mauro8792',
            'email' => 'mauroyini@gmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);
    }
}
