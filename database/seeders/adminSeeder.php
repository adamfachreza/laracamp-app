<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'name' => 'admin',
                'email' => 'admin@laracamp.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('admin'),
            ],
        ];
        foreach($admin as $key => $adm){
            User::create($adm);
        }
    }

}
