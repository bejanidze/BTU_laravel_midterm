<?php

use Illuminate\Database\Seeder;
use App\Applicant;
use Illuminate\Support\Str;

class ApplicantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<10;$i++){
            Applicant::create([
                'name'=>Str::random(10),
                'surname'=>Str::random(10).'dze',
                'position'=>Str::random(10),
                'phone'=>rand(111111111,999999999),
                'is_hired'=>rand(0,1)
            ]);
        }
    }
}
