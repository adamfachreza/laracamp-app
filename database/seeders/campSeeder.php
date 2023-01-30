<?php

namespace Database\Seeders;

use App\Models\camp;
use Illuminate\Database\Seeder;

class campSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $camps = [
            [
                'title' => "Gila Belajar",
                'slug' => "gila-belajar",
                'price' => 280,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date('Y-m-d H:i:s'),
                //penulisannya bisa kaya gini
                // 'slug' => Str::slug('Gila Belajar'),

                ],
                [
                    'title' => "Baru Mulai",
                'slug' => "baru-mulai",
                'price' => 140,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date('Y-m-d H:i:s'),
                ],
        ];
        foreach($camps as $key => $camp){
            camp::create($camp);
        }
    }
}
