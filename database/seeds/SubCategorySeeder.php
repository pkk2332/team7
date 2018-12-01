<?php

use Illuminate\Database\Seeder;
use App\SubCategory;
class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $faker = Faker\Factory::create();
        for($i=1; $i < 15; $i++) {
        	SubCategory::create([
       		'category_id'=>$faker->randomDigit,        		
       		'name' =>$faker->name

        	]);
    	}
    }
}
