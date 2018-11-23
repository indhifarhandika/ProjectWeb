<?php

use Illuminate\Database\Seeder;
use App\User;

class useradmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name'=>'Indhi Farhandika',
          'email'=>'indhifarhandika@outlook.com',
          'alamat'=>'Desa Deket Wetan',
          'password'=>Hash::make('123456'),
          'status'=>'admin'
        ]);
    }
}
