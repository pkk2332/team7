<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        for($i=1; $i < 15; $i++) {
        	Category::create([
        		'name' =>$faker->name
        	]);
    	}
    }
}
