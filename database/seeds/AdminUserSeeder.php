<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Admin::create([
       	'name' => 'Sarad Shrestha',
       	'email' => 'sarad@test.com',
       	'username' => 'saradctha50',
       	'password' => bcrypt('123456789'),
       	'role_id' => 1,
       	'status' => 1,
       	'created_at' =>now(),
       	'updated_at' => now  (),
       ]);
    }
}
