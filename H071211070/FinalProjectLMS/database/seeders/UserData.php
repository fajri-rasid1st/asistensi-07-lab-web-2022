<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'level' => 1,
                'email' => 'superadmin@unhas.ac.id'
            ],
            [
                'name' => 'Dosen',
                'username' => '10234',
                'password' => bcrypt('dosen'),
                'level' => 2,
                'email' => 'dosen@unhas.ac.id'
            ],
            [
                'name' => 'Mahasiswa',
                'username' => 'H071211070',
                'password' => bcrypt('213852'),
                'level' => 3,
                'email' => 'firmansyah21h@unhas.ac.id'
            ]
        ];
        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
