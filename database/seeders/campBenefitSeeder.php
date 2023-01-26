<?php

namespace Database\Seeders;

use App\Models\campBenefit;
use Illuminate\Database\Seeder;

class campBenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campb =[
            [
                'camp_id' => 1,
                'name' => 'Pro Techstack Kit'
            ],
            [
                'camp_id' => 1,
                'name' => 'Mentoring Program'
            ],
            [
                'camp_id' => 2,
                'name' => 'Final Project Certificate'
            ],
            [
                'camp_id' => 2,
                'name' => 'Premium Design Kit'
            ],
        ];

        foreach ($campb as $key => $cb)
        {
            campBenefit::create($cb);
        }
    }
}
