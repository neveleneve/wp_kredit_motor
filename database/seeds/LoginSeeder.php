<?php

use App\Login;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Login::insert([
            [
                'username' => 'zatiraalan',
                'password' => Hash::make('zatiraalan123', [
                    'rounds' => 10
                ]),
                'level' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'budiman',
                'password' => Hash::make('budiman123', [
                    'rounds' => 10
                ]),
                'level' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
