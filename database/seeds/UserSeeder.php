<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new App\User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = \Hash::make('adminuwu');
        $user->remember_token = Str::random(100);
        $user->save();
        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('bukansaya'),
        // ]);
    }
}
