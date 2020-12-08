<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin3',
            'email'=>'admin3@gmail.com',
            'password'=> bcrypt('123456'),
            'admin' => true
        ]);
    }
}
