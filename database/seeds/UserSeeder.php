<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
        		'id'=>1,
        		'name'=>'admin',
        		'email'=>'admin@gmail.com',
        		'admin_id'=>1,
        		'password'=>Hash::make('password')
        	]);


       Admin::create([
        'id'=>1,
        'role'=>'superadmin',
        'category_id'=>0,
        'c_name'=>'none'
    ]);


    }
}
