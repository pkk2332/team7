<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *  
     * @return void
     */
    public function run()
    {


        // $this->call(SubCategorySeeder::class);
<<<<<<< HEAD
         //$this->call(CategorySeeder::class);
         $this->call(UserSeeder::class);
=======
       $this->call(CategorySeeder::class);
       $this->call(UserSeeder::class);
>>>>>>> ba644da8b5b039a783776957ca2fa642da43ef3a

       $this->call(SubCategorySeeder::class);
       // $this->call(ProductSeeder::class);

   }
}
