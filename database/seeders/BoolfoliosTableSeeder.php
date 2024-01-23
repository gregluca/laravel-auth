<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Boolfolio;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class BoolfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $boolfolio = config('boolfolios'); 
        for($i = 0; $i < 10; $i++) {
            $boolfolio = new Boolfolio();
            $boolfolio->title = $faker->sentence(15);
            $boolfolio->description = $faker->text(500);
            $boolfolio->project_date = $faker->date();
            $boolfolio->slug = Str::slug($boolfolio->title);
            $boolfolio->save();
        }

    }
}
