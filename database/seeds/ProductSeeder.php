<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
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
        Product::create([
        		'name' =>$faker->name,
                'quantity'=>$faker->randomDigit,
                'description'=>$faker->text,
                'size'=>$faker->randomDigit,
                'weight'=>$faker->randomDigit,
                'price'=>$faker->randomDigit*100
        	]);
   		 }
    }
}
