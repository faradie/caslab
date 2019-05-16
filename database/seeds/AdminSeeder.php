<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nim' => '201531000',
            'name' => 'Admin',
            'email' => 'admin@multimedia.com',
            'password' => bcrypt(123123),
            'alamat' => 'Jakarta',
            'tempat_lahir' => 'Jakarta',
            'tgl_lahir' => '2019-01-07'
        ]);

        $user->assignRole('admin');
    }
}
