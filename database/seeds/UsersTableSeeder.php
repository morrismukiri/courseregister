<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$departments= array('Computer Science','Chemistry','Mathematics','Animal Health','Hospitality');
    	$faker = Faker::create();
    	DB::table('users')->insert([
            'name' => 'Morris Mukiri',
            'email' => 'morrismukiri@gmail.com',
            'role' => 'admin',
            'status' => 1,
            'department' => $departments[array_rand($departments)],
            'password' => bcrypt('secret'),
        ]);
    	for ($i = 0; $i < 15; $i++) {
	    	DB::table('users')->insert([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'role' => 'lecturer',
	            'status' => 1,
	            'department' => $departments[array_rand($departments)],
	            'password' => bcrypt('secret'),
	        ]);
	    }
	    for ($i = 0; $i < 15; $i++) {
	        DB::table('users')->insert([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'registration'=> strtoupper(str_random(3)).random_int(1, 3).'/'.random_int(10000, 99999).'/'.random_int(12, 16),
	            'role' => 'student',
	            'status' => 1,
	            'department' => $departments[array_rand($departments)],
	            'password' => bcrypt('secret'),
	        ]);
	    }
         
    }
}
