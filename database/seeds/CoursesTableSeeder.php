<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   		$faker =Faker\Factory::create();
        for ($i = 0; $i < 15; $i++) {
	    	DB::table('courses')->insert([
	            'code' => str_random(4).random_int(100, 450),
	            'name' =>$faker->sentence(5, true),
	            'lecturer' => random_int(2, 15),
	            'capacity'=> random_int(10, 500)
	        ]);
	    }
    }
}
