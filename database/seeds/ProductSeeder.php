<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	[
		       	'name' => 'Sandip Shrestha',
		       	'email' => 'sandip@test.com',
		       	'username' => 'sandipctha50',
		       	'password' => bcrypt('123456789'),
		       	'role_id' => 1,
		       	'status' => 1,
		       	'created_at' =>now(),
		       	'updated_at' => now  (),
		    ],
		]);
    
    }
}
