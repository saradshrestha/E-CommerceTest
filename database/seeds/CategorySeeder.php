<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Category::create(
      [
        [
       	'title' => 'Electronic',
       	'code' => 'ELECTRO',
       	'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mollis lacus mauris, consectetur dictum mauris feugiat maximus. Vivamus consectetur elit sit amet dui euismod, ac auctor sapien pellentesque. Aenean mattis diam quam, nec auctor leo ultricies quis. Pellentesque tristique maximus ipsum vel sollicitudin. Suspendisse pellentesque rutrum faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus sem lectus, bibendum lacinia mollis in, viverra non urna. Vivamus tempor porta pharetra. ',
       
       	'parent_id' => 0,
       	'status' => 1,
       	'created_at' =>now(),
       	'updated_at' => now  (),
       ],
       [
       	'title' => 'Smart Phone',
       	'code' => 'STPE',
       	'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mollis lacus mauris, consectetur dictum mauris feugiat maximus. Vivamus consectetur elit sit amet dui euismod, ac auctor sapien pellentesque. Aenean mattis diam quam, nec auctor leo ultricies quis. Pellentesque tristique maximus ipsum vel sollicitudin. Suspendisse pellentesque rutrum faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus sem lectus, bibendum lacinia mollis in, viverra non urna. Vivamus tempor porta pharetra. ',
       
       	'parent_id' => 1,
       	'status' => 1,
       	'created_at' =>now(),
       	'updated_at' => now(),
       ],
       [
       	'title' => 'Laptops',
       	'code' => 'LATPS',
       	'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mollis lacus mauris, consectetur dictum mauris feugiat maximus. Vivamus consectetur elit sit amet dui euismod, ac auctor sapien pellentesque. Aenean mattis diam quam, nec auctor leo ultricies quis. Pellentesque tristique maximus ipsum vel sollicitudin. Suspendisse pellentesque rutrum faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus sem lectus, bibendum lacinia mollis in, viverra non urna. Vivamus tempor porta pharetra. ',
       
       	'parent_id' => 1,
       	'status' => 1,
       	'created_at' =>now(),
       	'updated_at' => now  (),
       ],
       [
       	'title' => 'Televisions',
       	'code' => 'TVS',
       	'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mollis lacus mauris, consectetur dictum mauris feugiat maximus. Vivamus consectetur elit sit amet dui euismod, ac auctor sapien pellentesque. Aenean mattis diam quam, nec auctor leo ultricies quis. Pellentesque tristique maximus ipsum vel sollicitudin. Suspendisse pellentesque rutrum faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus sem lectus, bibendum lacinia mollis in, viverra non urna. Vivamus tempor porta pharetra. ',
       
       	'parent_id' => 1,
       	'status' => 1,
       	'created_at' =>now(),
       	'updated_at' => now  (),
       ],
       [
       	'title' => 'Ovens',
       	'code' => 'OVENS',
       	'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mollis lacus mauris, consectetur dictum mauris feugiat maximus. Vivamus consectetur elit sit amet dui euismod, ac auctor sapien pellentesque. Aenean mattis diam quam, nec auctor leo ultricies quis. Pellentesque tristique maximus ipsum vel sollicitudin. Suspendisse pellentesque rutrum faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus sem lectus, bibendum lacinia mollis in, viverra non urna. Vivamus tempor porta pharetra. ',
       
       	'parent_id' => 1,
       	'status' => 1,
       	'created_at' =>now(),
       	'updated_at' => now  (),
       ],
       [
       	'title' => 'Head Phones',
       	'code' => 'HEPH',
       	'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mollis lacus mauris, consectetur dictum mauris feugiat maximus. Vivamus consectetur elit sit amet dui euismod, ac auctor sapien pellentesque. Aenean mattis diam quam, nec auctor leo ultricies quis. Pellentesque tristique maximus ipsum vel sollicitudin. Suspendisse pellentesque rutrum faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus sem lectus, bibendum lacinia mollis in, viverra non urna. Vivamus tempor porta pharetra. ',
       
       	'parent_id' => 1,
       	'status' => 1,
       	'created_at' =>now(),
       	'updated_at' => now  (),
       ]
   ]);
  }

}
